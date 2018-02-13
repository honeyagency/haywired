<?php

function prepareHomepageFields()
{
    $videoPosterId = get_field('field_5a6a7230e9ce4');
    if ($videoPosterId != null) {
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

    $countdownTime = get_field('field_5a6a729ce9ceb');
    // $countdownTimestamp = strotime($countdownTime);
    $formattedCountdown = DateTime::createFromFormat('M d, Y H:i:s', $countdownTime);

    $interval = date_create('now')->diff($formattedCountdown);

    $countdown = array(
        'time'     => $countdownTime,
        'interval' => $interval,

        'title'    => get_field('field_5a6a72b1e9cec'),
        'content'  => get_field('field_5a6a72cae9ced'),
        'cta'      => get_field('field_5a6a72e4e9cee'),
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
    $prepareImageId = get_field('field_5a7e0e6ab1ab5');
    $prepareImage   = null;
    if (!empty($prepareImageId)) {
        $prepareImage = new TimberImage($prepareImageId);
    }
    $prepare = array(
        'image'     => $prepareImage,
        'title'     => get_field('field_5a6a731ee9cf0'),
        'content'   => get_field('field_5a6a7327e9cf1'),
        'scenarios' => $scenarios,
        'cta'       => get_field('field_5a6a7378e9cf5'),
    );
    $partnerImages = get_field('field_5a8217f9fb49d');

    if (!empty($partnerImages)) {
        foreach ($partnerImages as $image) {
            $gallery[] = new TimberImage($image['id']);
        }
    } else {
        $gallery = null;
    }
    $partners = array(
        'title'    => get_field('field_5a821687fb498'),
        'name'     => get_field('field_5a821697fb499'),
        'since'    => get_field('field_5a8216a3fb49a'),
        'content'  => get_field('field_5a8216b3fb49b'),
        'cta'      => get_field('field_5a8217e7fb49c'),
        'partners' => $gallery,
    );
    $home = array(
        'video'     => $video,
        'what'      => $what,
        'countdown' => $countdown,
        'prepare'   => $prepare,
        'partners'  => $partners,
    );
    return $home;

}
function prepareSocial()
{

    $social = array(
        'facebook'  => get_field('field_5a7a36cb38c9e', 'options'),
        'twitter'   => get_field('field_5a7a36db38ca0', 'options'),
        'instagram' => get_field('field_5a7a36d538c9f', 'options'),
    );
    return $social;
}

function prepareSiteOptions()
{

    $header = array(
        'resources' => get_field('field_5a7a39a3614fe', 'options'),
    );
    $options = array(
        'header' => $header,
    );
    return $options;
}

function prepareFooter()
{
    $involved = array(
        'title' => get_field('field_5a6a73c41eae2', 'options'),
        'text'  => get_field('field_5a6a73d11eae3', 'options'),
        'link'  => get_field('field_5a6a73e21eae4', 'options'),
    );
    $informed = array(
        'title'  => get_field('field_5a6a73fb1eae6', 'options'),
        'text'   => get_field('field_5a6a74071eae7', 'options'),
        'signup' => get_field('field_5a6a74111eae8', 'options'),
    );

    if (have_rows('field_5a6a745c1eaea', 'options')) {
        $navs = array();
        while (have_rows('field_5a6a745c1eaea', 'options')) {
            the_row();
            if (have_rows('field_5a6a74a01eaed', 'options')) {
                $links = array();
                while (have_rows('field_5a6a74a01eaed', 'options')) {
                    the_row();
                    $links[] = get_sub_field('field_5a6a74b01eaee', 'options');
                }
            }
            $navs[] = array(
                'title' => get_sub_field('field_5a6a74781eaec', 'options'),
                'links' => $links,
            );
        }
    }

    if (have_rows('field_5a6a74e91eaf0', 'options')) {
        $penultimatelinks = array();
        while (have_rows('field_5a6a74e91eaf0', 'options')) {
            the_row();
            $penultimatelinks[] = get_sub_field('field_5a6a75161eaf1', 'options');
        }
    }
    if (have_rows('field_5a8325012738a', 'options')) {
        $ultimatelinks = array();
        while (have_rows('field_5a8325012738a', 'options')) {
            the_row();
            $ultimatelinks[] = get_sub_field('field_5a8325012738b', 'options');
        }
    }
    $footer = array(
        'involved'    => $involved,
        'informed'    => $informed,
        'navs'        => $navs,
        'penultimate' => $penultimatelinks,
        'ultimate'    => $ultimatelinks,
    );
    return $footer;
}

function preparePageSettings()
{
    $title = get_field('field_5a834219fd9c5');
    if (!empty($title)) {
        $title = $title[0];
    }
    $settings = array(
        'parenttitle' => $title,
    );
    return $settings;
}
function prepareBeInformedPage()
{
    $intro = array(
        'title'   => get_field('field_5a8348af37ef6'),
        'content' => get_field('field_5a8348bf37ef7'),
        'cta'     => get_field('field_5a8348d037ef8'),
    );

    if (have_rows('field_5a83490a37efc')) {
        $stats = array();
        while (have_rows('field_5a83490a37efc')) {
            the_row();
            $stats[] = array(
                'number' => get_sub_field('field_5a83491f37efd'),
                'data'   => get_sub_field('field_5a83493437efe'),
            );
        }
    }

    if (have_rows('field_5a8349b837f06')) {
        $links = array();
        while (have_rows('field_5a8349b837f06')) {
            the_row();
            $links[] = array(
                'title'       => get_sub_field('field_5a8349ed37f07'),
                'description' => get_sub_field('field_5a8349ff37f08'),
                'link'        => get_sub_field('field_5a834a1037f09'),
            );
        }
    }
    $done = array(
        'title'   => get_field('field_5a8348f337efa'),
        'content' => get_field('field_5a8348ff37efb'),
        'stats'   => $stats,
        'cta'    => get_field('field_5a83494c37eff'),
    );
    $know = array(
        'title'   => get_field('field_5a83496c37f01'),
        'content' => get_field('field_5a83497637f02'),
        'quote'   => get_field('field_5a83498c37f03'),
        'author'  => get_field('field_5a83499f37f04'),
    );
    $section = array(
        'intro' => $intro,
        'done'  => $done,
        'know'  => $know,
        'links' => $links,
    );
    return $section;
}
