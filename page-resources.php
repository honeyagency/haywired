<?php
// Template Name: Media Downloads
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
$context['media']    = prepareCongratsPage();

Timber::render(array('page-resources.twig'), $context);
