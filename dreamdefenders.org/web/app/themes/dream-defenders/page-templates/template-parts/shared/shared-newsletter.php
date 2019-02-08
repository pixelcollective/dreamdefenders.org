<?php
  // style vars
  $newsletter_background_color        = get_field('newsletter_background_color');
  $newsletter_text_color              = get_field('newsletter_text_color');
  $newsletter_image                   = get_field('newsletter_image');
  $newsletter_form_text_color         = get_field('newsletter_form_text_color');
  $newsletter_heading                 = get_field('newsletter_heading');
  $newsletter_heading_text_color      = get_field('newsletter_heading_text_color');
  $newsletter_subheading              = get_field('newsletter_subheading');
  $newsletter_subheading_text_color   = get_field('newsletter_subheading_text_color');
  $form_id                            = get_field('brilliant_web-to-lead_form_id');
?>


<style type="text/css">  
  /*  redefine CSS vars set in _cta.scss
      according to ACF selected values 
  */
  .newsletter-container {
    --newsletter-background-color: <?php echo $newsletter_background_color; ?>;
    --newsletter-text-color: <?php echo $newsletter_text_color; ?>;
  }

</style>

<section class="newsletter-containter" style="background-color: <?php echo $newsletter_background_color; ?>;">
  <div class="newsletter-content">
    <div class="newsletter-headline">
      <h2 style="color: <?php echo $newsletter_heading_text_color; ?>;"><?php echo $newsletter_heading; ?></h1>
    </div>
    
    <div class="newsletter-image hide-on-mobile" style="background-image: url(<?php echo $newsletter_image ?>);">
    </div>
  </div>

  <div class="newsletter-content">
    <div class="newsletter-subheading">
      <?php if($newsletter_subheading) { ?>
      <h4 style="color: <?php echo $newsletter_subheading_text_color; ?>;"><?php echo $newsletter_subheading; ?></h3>
      <?php } ?>
    </div>
    
    <div class="newsletter-form" >
      <?php echo do_shortcode("[salesforce form='$form_id']"); ?>
    </div>
  </div>
</section>
