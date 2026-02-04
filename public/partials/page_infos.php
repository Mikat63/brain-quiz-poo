<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- general meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un quiz fun et stimulant pour défier vos amis et enrichir votre culture générale.">
    <meta name="author" content="Mika">

    <!-- Open Graph meta -->
    <meta property="og:title" content="Brain Quiz - Testez vos connaissances !">
    <meta property="og:description" content="Un quiz fun et stimulant pour défier vos amis et enrichir votre culture générale.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="#">
    <meta property="og:image" content="img/quiz/og-image.jpg">

    <!-- Balise son ld+json (données structurées) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "BRAIN QUIZ",
            "url": "#",
            "description": "Un quiz fun et stimulant pour défier vos amis et enrichir votre culture générale.",
            "author": {
                "@type": "Person",
                "name": "Mika"
            },
            "image": "../assets/img/brain_q_logo.webp"
        }
    </script>

    <!-- font meta -->
    <link rel="preload" href="../assets/fonts/Manrope/static/Manrope-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="../assets/fonts/Inter/static/Inter_18pt-Regular.woff2" as="font" type="font/woff2" crossorigin>

    <!-- CSS & JS links -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <script defer src="assets/scripts/main.js"></script>
    <title><?= "BRAIN QUIZ - $title" ?></title>


</head>

<body class="min-h-svh bg-linear-to-b from-[#0b0a4c] to-[#4b169d]">