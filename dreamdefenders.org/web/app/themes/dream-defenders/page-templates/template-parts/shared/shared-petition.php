<?php
  // style vars
  $petition_background_color        = get_field('petition_background_color');
  $petition_form_background_color   = get_field('petition_form_background_color');
  $petition_text_color              = get_field('petition_text_color');
  $petition_form_text_color         = get_field('petition_form_text_color');
  $petition_heading                 = get_field('petition_heading');
  $petition_heading_text_color      = get_field('petition_heading_text_color');
  $petition_subheading              = get_field('petition_subheading');
  $petition_subheading_text_color   = get_field('petition_subheading_text_color');
  $petition_form_heading            = get_field('petition_form_heading');
  $petition_form_heading_text_color      = get_field('petition_form_heading_text_color');
  $petition_form_subheading              = get_field('petition_form_subheading');
  $petition_form_subheading_text_color   = get_field('petition_form_subheading_text_color');
  $form_id                          = get_field('brilliant_web-to-lead_form_id');
?>


<style type="text/css">  
  /*  redefine CSS vars set in _cta.scss
      according to ACF selected values 
  */
  .petition-container {
    --petition-background-color: <?php echo $petition_background_color; ?>;
    --petition-text-color: <?php echo $petition_text_color; ?>;
  }

</style>

<section class="petition-container" style="background-color: <?php echo $petition_background_color; ?>;">
  <div class="petition-content" style="color: <?php echo $petition_text_color; ?>;">
    <?php if($petition_heading) { ?>
      <div class="petition-text">
        <h2 class="petition-headline" style="color: <?php echo $petition_heading_text_color; ?>;"><?php echo $petition_heading; ?></h1>
      <?php } ?>
      <?php if($petition_subheading) { ?>
        <h4 class="petition-subheading" style="color: <?php echo $petition_subheading_text_color; ?>;"><?php echo $petition_subheading; ?></h3>
      <?php } ?>
      <?php echo the_content(); ?>
    </div>
    
    <div class="petition-form" >
      <?php if($petition_form_heading) { ?>
        <h2 class="petition-headline" style="color: <?php echo $petition_form_heading_text_color; ?>;"><?php echo $petition_form_heading; ?></h1>
      <?php } ?>
      <?php if($petition_form_subheading) { ?>
        <h4 class="petition-subheading" style="color: <?php echo $petition_form_subheading_text_color; ?>;"><?php echo $petition_form_subheading; ?></h3>
      <?php } ?>
      
      <?php echo do_shortcode("[salesforce form='$form_id']"); ?>
    </div>

  </div>

</section>
