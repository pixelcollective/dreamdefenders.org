<?php 
  $blog_index_background_color =  get_field('blog_index_background_color');
  $blog_item_overlay_color     =  get_field('blog_item_overlay_color');
  $blog_item_opacity_raw       =  get_field('blog_item_overlay_opacity');
  $blog_item_opacity           =  ($blog_item_opacity_raw / 100);
  $blog_item_text_color        =  get_field('blog_item_text_color');
  $blog_item_overlay_color     =  get_field('blog_item_overlay_color');



  if ( have_posts() ) {
        
        // echo '<div class="blog-row row">';
        $slug = get_page_by_path( 'blog' ); 
        echo $slug->ID;
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-xs-12 style="background-color:'. $blog_item_overlay_color .';">';
        echo '<div class="row masonry">';
  // get title
  // get subtitle
  // get date
        while (have_posts()) {
          the_post();
          if(get_post_status() == 'publish') {

            
            if(get_field('hero_background_image')) {
              $blog_thumb = get_field('hero_background_image');
              $has_image = true;
            } else if(get_field('hero_background_color')){
              $blog_thumb = get_field('hero_background_color');
              $has_image = false;
            } else if(get_field('post_hero_background_image')) {
              $blog_thumb = get_field('post_hero_background_image');
              $has_image = true;
            } else if(get_field('post_hero_background_color')){
              $blog_thumb = get_field('post_hero_background_color');
              $has_image = false;
            }
            
            echo  '<div class="brick padding">';
            echo  '<div class="brick-content">';
            echo   '<a href="'. get_the_permalink() .'">';
            echo   '<div class="post-item-container">';
            echo   '<div class="post-item" style="background-image:url(' . $blog_thumb .');">';
            echo   '<div class="post-item-overlay"  style="background-color:'. $blog_item_overlay_color .';">';
            echo   '<div class="post-item-text">';
            echo   '<h4 class="post-item-subtitle">' . get_the_author_meta('display_name') . '</span>';
            echo   '<h3 class="post-item-title">' . get_the_title() .'</h2>';
            echo   '</div>';
            echo   '</div>';
            echo   '</div>';
            echo   '</div>';
            echo   '</a>';
            echo   '</div>';
            echo   '</div>';
          }
        } 
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
?>



