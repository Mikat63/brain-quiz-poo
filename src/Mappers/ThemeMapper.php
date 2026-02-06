<?php

final class ThemeMapper
{

    public function mapToObject(array $data): Theme
    {
        return new Theme(
            theme: $data['themes'],
            imgSmallSrc: $data['img_small_src'],
            imgLargeSrc: $data['img_large_src']
        );
    }
}
