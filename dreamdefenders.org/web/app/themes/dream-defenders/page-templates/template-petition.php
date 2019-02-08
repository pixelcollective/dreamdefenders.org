<?php
/**
 * Template Name: Full-Width, Petition
 * Template Post Type: post, page
 *
 * This template display content at full with, with no sidebars.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package some_like_it_neat
 */
$tag_list = get_the_tag_list( '', __( ', ', 'some-like-it-neat' ) );

$bg_image = get_the_post_thumbnail_url();

$shared_path = 'page-templates/template-parts/shared/shared';

get_header(); ?>

	<div>

		<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'page-templates/template-parts/content', 'single' ); ?>
	
	<?php endwhile; ?>

		<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>
	</div><!-- #primary -->
	<?php echo do_shortcode('[instagram-feed]') ?>

<?php get_footer(); ?>
