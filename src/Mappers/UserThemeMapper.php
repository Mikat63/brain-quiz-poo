<?php

final class UserThemeMapper
{
    public function mapToObject($array, $themeObject): UserTheme
    {
        $userObject = new User(
            username: $array['user']
        );

        return new UserTheme(
            user: $userObject,
            theme: $themeObject,
            score: $array['user_score'],
        );
    }
}
