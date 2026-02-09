<?php

final class UserThemeMapper
{
    public function mapToObject($userThemeArray, $themeObject): UserTheme
    {
        $userObject = new User(
            username: $userThemeArray['user'],
        );

        return new UserTheme(
            user: $userObject,
            theme: $themeObject,
            score: $userThemeArray['user_score'],
        );
    }
}
