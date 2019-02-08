<?php
/**
 * The template for displaying all singular post types.
 *
 * This is the template that gets used in absence of single.php, page.php, or a
 * singular post type template. Is also "true" for is_singular().
 *
 * @package some_like_it_neat
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
