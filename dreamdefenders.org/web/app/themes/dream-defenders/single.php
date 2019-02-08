<?php
/**
 * The Template for displaying all single posts.
 *
 * @package some_like_it_neat
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/template-parts/content', 'single' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
