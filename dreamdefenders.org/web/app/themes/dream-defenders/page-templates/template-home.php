<?php
/**
 * Template Name: Full-Width, Home
 *
 * This template display content at full with, with no sidebars.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package some_like_it_neat
 */
$shared_path = 'page-templates/template-parts/shared/shared'; 
get_header(); ?>

<div class="home-content">


  <?php get_template_part($shared_path, 'hero'); ?>
  <?php get_template_part($shared_path, 'newsletter'); ?>
  <?php get_template_part($shared_path, 'cta'); ?>
  <?php get_template_part($shared_path, 'donate-cta'); ?>
  <?php echo do_shortcode('[instagram-feed]') ?>

</div>

<?php get_footer(); ?>
