const counterQuestion = document.querySelector("#counter_question");
const quizContainer = document.querySelector("#quiz_container");
const imgQuestion = document.querySelector("#img_question");
const question = document.querySelector("#question");
const answersBtn = document.querySelectorAll(".answer_btn");

let questionLocked = false;

// fetch ajax function
function http_request(questionId, answerId) {
  if (questionLocked) return;
  questionLocked = true;
  timerRunning = false; // stop timer
  fetch("/brain-quiz-poo/process/next_question.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      questionId: questionId,
      answerId: answerId,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      showResulAnswer(data);
    });
}

// listening answer click
answersBtn.forEach((answer) => {
  answer.addEventListener("click", () => {
    if (questionLocked) return;
    questionLocked = true;
    timerRunning = false; // stop timer
    const answerId = answer.dataset.answer;
    const questionId = answer.dataset.question;

    answer.blur();
    http_request(questionId, answerId);
  });
});

// function to show if answer is correct the button be green and if false red
//update the next question
function showResulAnswer(data) {
  const goodAnswerId = data.id_answer;
  const clickedAnswerId = data.clicked_answer;
  const isSkip = clickedAnswerId === null; // skip_question: pas de réponse cliquée

  // Color feedback
  if (!isSkip) {
    document.querySelectorAll(".answer_btn").forEach((answer) => {
      if (data.is_correct) {
        if (parseInt(answer.dataset.answer) === parseInt(goodAnswerId)) {
          answer.classList.remove("bg-[#0879C9]");
          answer.classList.add("bg-[#1E8717]");
        }
      }
      if (!data.is_correct) {
        if (parseInt(answer.dataset.answer) === parseInt(goodAnswerId)) {
          answer.classList.remove("bg-[#0879C9]");
          answer.classList.add("bg-[#1E8717]");
        }
        if (parseInt(answer.dataset.answer) === parseInt(clickedAnswerId)) {
          answer.classList.remove("bg-[#0879C9]");
          answer.classList.add("bg-[#C91D1D]");
        }
      }
    });
  }

  if (data.status === "finished") {
    setTimeout(() => {
      if (quizContainer) {
        quizContainer.classList.add(
          "opacity-0",
          "transition-opacity",
          "duration-4000",
        );
      }
      setTimeout(() => {
        window.location.href = "./score_player.php";
      }, 4000);
    }, 2000);
    return;
  }

  const feedbackDelay = isSkip ? 0 : 2000;

  setTimeout(() => {
    if (quizContainer) {
      quizContainer.classList.add(
        "opacity-0",
        "transition-opacity",
        "duration-4000",
      );
    }
    setTimeout(() => {
      // Mise à jour du DOM pour la nouvelle question
      quizContainer.classList.remove(
        "opacity-0",
        "transition-opacity",
        "duration-4000",
      );

      counterQuestion.textContent = data.next_question;
      imgQuestion.src = data.img_desktop;
      imgQuestion.srcset = `${data.img_mobile} 600w, ${data.img_desktop} 1024w`;
      imgQuestion.sizes = "(max-width: 600px) 600px, 1024px";
      question.textContent = data.question;

      // Remplace le container des réponses par les nouveaux boutons
      const answerContainer = document.getElementById("answer_container");
      answerContainer.innerHTML = "";
      data.answers.forEach((ans) => {
        const btn = document.createElement("button");
        btn.className =
          "answer_btn w-full p-2 bg-[#0879C9] text-white rounded-md font-[Inter] text-base cursor-pointer transition duration-300";
        btn.dataset.answer = ans.id;
        btn.dataset.question = data.id_question;
        btn.textContent = ans.answer;
        btn.addEventListener("click", () => {
          btn.blur();
          http_request(data.id_question, ans.id);
        });
        answerContainer.appendChild(btn);
      });

      // Remise à zéro du verrou pour la prochaine question
      questionLocked = false;
      timerRunning = false;
      start = null;
      bar.style.width = "100%";
      requestAnimationFrame(() => {
        timerRunning = true;
        requestAnimationFrame(timer);
      });
    }, 2000);
  }, feedbackDelay);
}

// progression bar
const duration = 10;
const bar = document.querySelector("#timer-bar");
let start = null;
let timerRunning = true;

function timer(ts) {
  if (!timerRunning) return;
  if (!start) start = ts;

  const elapsed = (ts - start) / 1000;
  const percent = Math.max(0, 100 - (elapsed / duration) * 100);

  bar.style.width = percent + "%";

  if (elapsed < duration) {
    requestAnimationFrame(timer);
  } else {
    bar.style.width = "0%";
    const quizContainer = document.querySelector("#quiz_container");
    if (quizContainer) {
      quizContainer.classList.add(
        "opacity-0",
        "transition-opacity",
        "duration-4000",
      );

      fetch("/brain-quiz-poo/process/skip_question.php")
        .then((response) => response.json())
        .then((data) => showResulAnswer(data));
    }
  }
}

requestAnimationFrame(timer);
