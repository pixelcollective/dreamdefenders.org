<?php
/**
 * Template Name: Full-Width, Donation
 * Template Post Type: post, page
 *
 * This template display content at full with, with no sidebars.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package some_like_it_neat
 */
$tag_list = get_the_tag_list( '', __( ', ', 'some-like-it-neat' ) );

$bg_image = get_the_post_thumbnail_url();

$blog_date = get_the_date( 'j M' );

$blog_author = get_the_author_meta('display_name');

$shared_path = 'page-templates/template-parts/shared/shared';

get_header(); ?>

	<div>
		<?php //get_template_part($shared_path, 'hero'); ?>
		<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<?php
			/* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
			get_template_part( 'page-templates/template-parts/content', 'single' );

		?>

	<?php endwhile; ?>

	<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

	</div>
  <?php echo do_shortcode('[instagram-feed]') ?>

<?php get_footer(); ?>
