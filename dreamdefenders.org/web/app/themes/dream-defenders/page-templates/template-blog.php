<?php
/**
 * Template Name: Full-Width, Blog 
 *
 * This template display content at full with, with no sidebars.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package some_like_it_neat
 */
$shared_path = 'page-templates/template-parts/shared/shared'; 

get_header(); ?>

      <?php get_template_part($shared_path, 'post-hero'); ?>
            <?php
            $blog_index_background_color =  get_field('blog_index_background_color');
            $blog_item_overlay_color     =  get_field('blog_item_overlay_color');
            $blog_item_opacity_raw       =  get_field('blog_item_overlay_opacity');
            $blog_item_opacity           =  ($blog_item_opacity_raw / 100);
            $blog_item_text_color        =  get_field('blog_item_text_color');
            $blog_item_overlay_color     =  get_field('blog_item_overlay_color');
            ?>      
      <section id="blog-index" class="section" style="<?php echo 'background-color:'. $blog_index_background_color . ';'?>">

      </section>

      <h4 id="max-blog-posts" class="hidden blog-max-message center-text">check back later for more blog posts!</h4>


<?php get_footer(); ?>
