<?php
// Template Name: Challenge Form
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
$context['form']    = prepareSubmissionIntro();

Timber::render(array('page-challenge-submission.twig'), $context);
