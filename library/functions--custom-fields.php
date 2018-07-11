<?php

function prepareHomepageFields()
{
    $videoPosterId = get_field('field_5a6a7230e9ce4');
    if ($videoPosterId != null) {
        $videoPoster = new TimberImage($videoPosterId);
    } else {
        $videoPoster = null;
    }
    $mobileImageId = get_field('field_5a875b31aaab7');
    if ($mobileImageId != null) {
        $mobileImage = new TimberImage($mobileImageId);
    } else {
        $mobileImage = null;
    }

    $video = array(
        'ogg'     => get_field('field_5a6a719de9ce1'),
        'webm'    => get_field('field_5a6a7208e9ce2'),
        'mp4'     => get_field('field_5a6a7225e9ce3'),
        'poster'  => $videoPoster,
        'mobile'  => $mobileImage,
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
        'newscta'  => get_field('field_5a8462ceb0663'),
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
    $formId  = get_field('field_5a7a39a3614fe', 'options');
    $theForm = gravity_form($formId, false, false, false, null, true, null, false);
    $header  = array(
        'form'    => $theForm,
        'nav'     => get_field('field_5ad795d1eb60f', 'options'),
        'title'   => get_field('field_5ad79b9a05e00', 'options'),
        'content' => get_field('field_5ad79bb905e01', 'options'),
    );
    $options = array(
        'signuptxt' => get_field('field_5a846e93f2910', 'options'),
        'header'    => $header,
        'search'    => get_search_form(false),
        'liability' => get_field('field_5ad6b43f02c51', 'options'),
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
    $bgImageId = get_field('field_5a8371607ccd0');
    $bgImage   = null;
    if (!empty($bgImageId)) {
        $bgImage = new TimberImage($bgImageId);
    }
    $linksection = array(
        'links' => $links,
        'image' => $bgImage,
    );
    $done = array(
        'title'   => get_field('field_5a8348f337efa'),
        'content' => get_field('field_5a8348ff37efb'),
        'stats'   => $stats,
        'cta'     => get_field('field_5a83494c37eff'),
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
        'links' => $linksection,
    );
    return $section;
}
function prepareResiliencyFields()
{
    $intro = array(
        'title'   => get_field('field_5a83784e3960d'),
        'content' => get_field('field_5a8378563960e'),
    );
    $challenge = array(
        'title'   => get_field('field_5a83787339610'),
        'content' => get_field('field_5a83794a39611'),
        'text'    => get_field('field_5a83829d2eaaa'),
        'link'    => get_field('field_5ad679481195d'),
    );
    $exampleImageId = get_field('field_5a8379d407e2d');
    $exampleImage   = null;
    if (!empty($exampleImageId)) {
        $exampleImage = new TimberImage($exampleImageId);
    }
    $resilBgImageId = get_field('field_5a837be1aa799');
    $resilBgImage   = null;
    if (!empty($resilBgImageId)) {
        $resilBgImage = new TimberImage($resilBgImageId);
    }
    $example = array(
        'title'   => get_field('field_5a8379a407e29'),
        'name'    => get_field('field_5a8379ac07e2a'),
        'since'   => get_field('field_5a8379b407e2b'),
        'content' => get_field('field_5a8379be07e2c'),
        'cta'     => get_field('field_5a8384e2043e5'),
        'image'   => $exampleImage,
        'bg'      => $resilBgImage,
    );
    $section = array(
        'intro'     => $intro,
        'challenge' => $challenge,
        'example'   => $example,
    );

    return $section;
}
function prepareEventFields()
{
    $event = array(
        'start_date' => get_field('field_5a8472804194d'),
        'start_time' => get_field('field_5a84728c4194e'),
        'end_date'   => get_field('field_5a8472954194f'),
        'end_time'   => get_field('field_5a8472a241950'),
    );
    return $event;
}
function prepareReportsPageFields()
{
    $intro = array(
        'title'   => get_field('field_5a847bdab2b3e'),
        'content' => get_field('field_5a847be2b2b3f'),
    );
    if (have_rows('field_5a847c0db2b41')) {
        $volumes = array();
        while (have_rows('field_5a847c0db2b41')) {
            the_row();

            if (have_rows('field_5a847c6b4c312')) {
                $takeaways = array();
                while (have_rows('field_5a847c6b4c312')) {
                    the_row();
                    $takeaways[] = array(
                        'icon'    => get_sub_field('field_5a847c754c313'),
                        'content' => get_sub_field('field_5a847c914c314'),
                    );
                }
            }
            $releaseDate          = get_sub_field('field_5a847cab2722a');
            $formattedReleaseDate = DateTime::createFromFormat('M d, Y H:i:s', $releaseDate);
            $interval             = date_create('now')->diff($formattedReleaseDate);

            $volumes[] = array(
                'title'        => get_sub_field('field_5a847c22b2b42'),
                'subtitle'     => get_sub_field('field_5a847c2db2b43'),
                'interval'     => $interval,
                'release_date' => $formattedReleaseDate,
                'content'      => get_sub_field('field_5a847c37b2b44'),
                'takeaways'    => $takeaways,
                'cta'          => get_sub_field('field_5a847c50b2b45'),
            );
        }

    }
    $volumeBgImageId = get_field('field_5a848fd3b8efe');
    $volumeBgImage   = null;
    if (!empty($volumeBgImageId)) {
        $volumeBgImage = new TimberImage($volumeBgImageId);
    }

    $media = array(
        'volumebg' => $volumeBgImage,
        'title'    => get_field('field_5a847ccf5d6ac'),
        'content'  => get_field('field_5a847cdb5d6ad'),
        'cta'      => get_field('field_5a847ceb5d6ae'),
    );

    $section = array(
        'intro'   => $intro,
        'volumes' => $volumes,
        'media'   => $media,
    );
    return $section;

}
function prepareResiliencyPage()
{
    $intro = array(
        'title'   => get_field('field_5a872a5baab6a'),
        'content' => get_field('field_5a872a5baab8b'),
        'cta'     => get_field('field_5a872a5baab8b'),
    );

    if (have_rows('field_5a872a5baac7a')) {
        $links = array();
        while (have_rows('field_5a872a5baac7a')) {
            the_row();
            $links[] = array(
                'title'       => get_sub_field('field_5a872a5bcca07'),
                'description' => get_sub_field('field_5a872a5bcca1c'),
                'link'        => get_sub_field('field_5a872a5bcca2a'),
            );
        }
    }
    $bgImageId = get_field('field_5a872a5baac68');
    $bgImage   = null;
    if (!empty($bgImageId)) {
        $bgImage = new TimberImage($bgImageId);
    }
    $linksection = array(
        'links' => $links,
        'image' => $bgImage,
    );
    $section = array(
        'intro' => $intro,

        'links' => $linksection,
    );
    return $section;
}
function challengePageOne()
{
    $intro = array(
        'title'   => get_field('field_5ad627d1d5081'),
        'content' => get_field('field_5ad627dfd5082'),

    );
    $theRightForm       = get_field('field_5ad62c221c5e3');
    $theRightFormObject = gravity_form($theRightForm, false, false, false, null, true, null, false);
    $right              = array(
        'title' => get_field('field_5ad62c131c5e2'),
        'form'  => $theRightFormObject,
    );
    $tierImageId = get_field('field_5ad6282255547');
    $tierImage   = null;
    if (!empty($tierImageId)) {
        $tierImage = new TimberImage($tierImageId);
    }

    if (have_rows('field_5ad6280555546')) {
        $tiers = array();
        while (have_rows('field_5ad6280555546')) {
            the_row();
            $theTierForm       = get_sub_field('field_5ad6285c5554a');
            $theTierFormObject = gravity_form($theTierForm, false, false, false, null, true, null, false);
            $tiers[]           = array(
                'title'   => get_sub_field('field_5ad6283c55548'),
                'content' => get_sub_field('field_5ad6284655549'),
                'form'    => $theTierFormObject,
            );
        }
    } else {
        $tiers = null;
    }
    $form = array(
        'title'   => get_field('field_5ad698b2c25a6'),
        'content' => get_field('field_5ad698bcc25a7'),
    );
    $challenge = array(
        'intro' => $intro,
        'right' => $right,
        'image' => $tierImage,
        'tiers' => $tiers,
        'form'  => $form,
    );
    return $challenge;
}
function prepareChallengeResources()
{
    $intro = array(
        'title'   => get_field('field_5ad6394d74b1c'),
        'content' => get_field('field_5ad6395974b1d'),
        'link'    => get_field('field_5ad6396b74b1e'),
    );

    if (have_rows('field_5ad639a39bd0d')) {
        $resources = array();
        while (have_rows('field_5ad639a39bd0d')) {
            the_row();
            if (have_rows('field_5ad63a0c9bd11')) {
                $content = array();
                while (have_rows('field_5ad63a0c9bd11')) {
                    the_row();
                    $content[] = array(
                        'title'    => get_sub_field('field_5ad63ee6ab185'),
                        'subtitle' => get_sub_field('field_5ad63a1a9bd12'),
                        'content'  => get_sub_field('field_5ad63a359bd13'),
                    );
                }
            }
            $resources[] = array(
                'title'   => get_sub_field('field_5ad639c29bd0e'),
                'link'    => get_sub_field('field_5ad639df9bd0f'),
                'content' => $content,
            );
        }
    }
    $section = array(
        'intro'     => $intro,
        'resources' => $resources,
    );
    return $section;
}
function prepareSubmissionIntro()
{
    $intro = array(
        'title'   => get_field('field_5ad666ce6942e'),
        'content' => get_field('field_5ad666d56942f'),
    );
    $formId     = get_field('field_5ad66a1dcdfce');
    $formObject = gravity_form($formId, false, false, false, null, true, null, false);
    $form       = array(
        'title' => get_field('field_5ad66a0ecdfcd'),
        'form'  => $formObject,

    );

    $section = array(
        'intro' => $intro,
        'form'  => $form,
    );
    return $section;
}
function prepareCongratsPage()
{
    $intro = array(
        'title'   => get_field('field_5ad6836faff65'),
        'content' => get_field('field_5ad6836faff77'),
    );
    if (have_rows('field_5ad6839169321')) {
        $linksection = array();
        while (have_rows('field_5ad6839169321')) {
            the_row();
            if (have_rows('field_5ad683a869323')) {
                $links = array();
                while (have_rows('field_5ad683a869323')) {
                    the_row();
                    $previewImage = null;
                    $previewId    = get_sub_field('field_5b466ed304e02');

                    if (!empty($previewId)) {
                        $previewImage = new TimberImage($previewId);
                    }

                    $links[] = array(
                        'title'   => get_sub_field('field_5ad6841a69326'),
                        'link'    => get_sub_field('field_5ad6848b6932b'),
                        'preview' => $previewImage,
                    );
                }
            }
            $linksection[] = array(
                'title' => get_sub_field('field_5ad683a069322'),
                'links' => $links,
            );
        }
    }

    $section = array(
        'intro' => $intro,
        'links' => $linksection,
    );
    return $section;
}
