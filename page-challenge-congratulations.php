<?php
// Template Name: Challenge Congratulations
/**
 * The template for the three resource overview pages for the challenge
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context                    = Timber::get_context();
$post                       = new TimberPost();
$context['post']            = $post;
$context['settings']        = preparePageSettings();
$context['congratulations'] = prepareCongratsPage();

Timber::render(array('page-challenge-congrats.twig'), $context);
