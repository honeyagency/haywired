<?php

function prepareHomepageFields()
{
    $videoPosterId = get_field('field_5a6a7230e9ce4');
    if ($videoId != null) {
        $videoPoster = new TimberImage($videoPosterId);
    } else {
        $videoPoster = null;
    }
    $video = array(
        'ogg'     => get_field('field_5a6a719de9ce1'),
        'webm'    => get_field('field_5a6a7208e9ce2'),
        'mp4'     => get_field('field_5a6a7225e9ce3'),
        'poster'  => $videoPoster,
        'content' => get_field('field_5a6a7ba788d96'),
    );
    $what = array(
        'title'   => get_field('field_5a6a724de9ce6'),
        'content' => get_field('field_5a6a725fe9ce7'),
        'cta'     => get_field('field_5a6a726ce9ce8'),
    );
    $countdown = array(
        'time'    => get_field('field_5a6a729ce9ceb'),
        'title'   => get_field('field_5a6a72b1e9cec'),
        'content' => get_field('field_5a6a72cae9ced'),
        'cta'     => get_field('field_5a6a72e4e9cee'),
    );

    if (have_rows('field_5a6a733ce9cf2')) {
        $scenarios = array();
        while (have_rows('field_5a6a733ce9cf2')) {
            the_row();
            $scenarios[] = array(
                'class'   => get_sub_field('field_5a6a7355e9cf3'),
                'content' => get_sub_field('field_5a6a735fe9cf4'),
            );
        }
    }
    $prepare = array(
        'title'     => get_field('field_5a6a731ee9cf0'),
        'content'   => get_field('field_5a6a7327e9cf1'),
        'scenarios' => $scenarios,
        'link'      => get_field('field_5a6a7378e9cf5'),
    );
    $home = array(
        'video'     => $video,
        'what'      => $what,
        'countdown' => $countdown,
        'prepare'   => $prepare,
    );
    return $home;

}
