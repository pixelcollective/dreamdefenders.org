<?php
  // style vars
  $donation_background_color        = get_field('donation_background_color');
  $donation_form_background_color   = get_field('donation_form_background_color');
  $donation_text_color              = get_field('donation_text_color');
  $donation_form_text_color         = get_field('donation_form_text_color');
  $donation_form_heading            = get_field('donation_form_heading');
  $donation_form_heading_text_color      = get_field('donation_form_heading_text_color');
  $donation_form_subheading              = get_field('donation_form_subheading');
  $donation_form_subheading_text_color   = get_field('donation_form_subheading_text_color');
  $form_id                          = get_field('donation_form_id');
?>

<style type="text/css">  
  .donation-container {
    --donation-background-color: <?php echo $donation_background_color; ?>;
    --donation-text-color: <?php echo $donation_text_color; ?>;
  }
</style>

<section class="donation-container" style="background-color: <?php echo $donation_background_color; ?>;">
  <div class="donation-content" style="color: <?php echo $donation_text_color; ?>;">
   
    <div class="donation-form" >
      <?php if($donation_form_heading) { ?>
        <h2 class="donation-headline" style="color: <?php echo $donation_form_heading_text_color; ?>;"><?php echo $donation_form_heading; ?></h1>
      <?php } ?>
      <?php if($donation_form_subheading) { ?>
        <h4 class="donation-subheading" style="color: <?php echo $donation_form_subheading_text_color; ?>;"><?php echo $donation_form_subheading; ?></h3>
      <?php } 
			  echo do_shortcode("[gravityform id='$form_id' title='true' description='true']");
      ?>
      
    </div>
  </div>
</section>
