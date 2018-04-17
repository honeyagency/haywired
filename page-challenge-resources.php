<?php
// Template Name: Challenge Resources
/**
 * The template for the three resource overview pages for the challenge
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context             = Timber::get_context();
$post                = new TimberPost();
$context['post']     = $post;
$context['settings'] = preparePageSettings();
$context['challenge'] = prepareChallengeResources();

Timber::render(array('page-challenge-resources.twig'), $context);
