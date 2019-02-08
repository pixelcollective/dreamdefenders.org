<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package some_like_it_neat
 */

get_header(); ?>

	<div class="section">
    <div class="section-holder">
      <div class="container">
			  <h1 class="page-title">
					<?php _e( 'Oops! That page can&rsquo;t be found.', 'some-like-it-neat' ); ?>
				</h1>
				<h2>
					<?php _e( 'It looks like nothing was found at this location.', 'some-like-it-neat' ); ?>
				</h2>
			</div>
		</div>
	</div>

<?php get_footer(); ?>	
