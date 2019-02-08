<?php
  // style vars
  $post_body_background_color    = get_field('post_body_background_color');
  $post_body_text_color          = get_field('post_body_text_color');
  $post_body_overlay_opacity    = ((int)get_field('post_body_overlay_opacity') / 100);
  $home_template_slug = 'page-templates/template-home.php';
?>


<style type="text/css">  
  /*  redefine CSS vars set in _cta.scss
      according to ACF selected values 
  */
  .post-body-container {
    --post-body-text-color: <?php echo $post_body_text_color; ?>;
    --post-body-background-color: <?php echo $post_body_background_color; ?>;
    --donate-cta-overlay-color: rgba(0,0,0,<?php echo $post_body_overlay_opacity; ?>);
  }

</style>


  <section class="post-body-container" style="background-color: <?php echo $post_body_background_color; ?>;">

  <div class="post-body-overlay"></div>


  <div class="post-body-content" style="color: <?php echo $post_body_text_color; ?>;">
    <?php echo the_content(); 
    echo is_page_template('page-templates/template-home');
    if(get_page_template_slug() == $home_template_slug ) {
      echo apply_filters( 'the_content', get_post( get_option( 'page_on_front' ) )->post_content );
    }?>
  </div>

</section>
