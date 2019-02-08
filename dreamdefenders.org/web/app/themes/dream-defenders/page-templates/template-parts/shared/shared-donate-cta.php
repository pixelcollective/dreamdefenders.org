<?php
  // style vars
  $donate_cta_background_image   = get_field('donate_cta_background_image');
  $donate_cta_background_color   = get_field('donate_cta_background_color');
  $donate_cta_overlay_opacity    = ((int)get_field('donate_cta_overlay_opacity') / 100);
  $donate_cta_button_color       = get_field('donate_cta_button_color');
  $donate_cta_desktop_alignment  = get_field('donate_cta_desktop_alignment');
  $donate_cta_content_alignment  = $donate_cta_desktop_alignment;
  
  // content vars
  $donate_cta_headline   = get_field('donate_cta_headline');
  $donate_cta_subheading = get_field('donate_cta_subheading');
  $donate_cta_button_text   = get_field('donate_cta_button_text');
  $donate_cta_button_link   = get_field('donate_cta_button_link');

  $donate_cta_white_btn_text = ".donate-cta-button:hover { color: #ffffff; }";
?>


<style type="text/css">  
  /*  redefine CSS vars set in _cta.scss
      according to ACF selected values 
  */
  .donate-cta-containter {
    --donate-cta-button-color: <?php echo $donate_cta_button_color; ?>;
    --donate-cta-overlay-color: rgba(0,0,0,<?php echo $donate_cta_overlay_opacity; ?>);
  }

  <?php if($donate_cta_button_color == "#000000") {
    echo $donate_cta_white_btn_text;
  } ?>
  
</style>


<?php if($donate_cta_background_image) {
    ?>
    <section class="donate-cta-containter" style="background-image: url(<?php echo $donate_cta_background_image; ?>);">
<?php } else {
    ?>
    <section class="donate-cta-containter" style="background-color: <?php echo $donate_cta_background_color; ?>;">
        <?php
}?>

  <div class="donate-cta-overlay"></div>
  
  <div class="donate-cta-content <?php echo $donate_cta_content_alignment; ?>">
      <h3 class="subheading"><?php echo $donate_cta_subheading; ?></h3>
      <h1 class="headline"><?php echo $donate_cta_headline; ?></h1>
      <a class="donate-cta-button" href="<?php echo $donate_cta_button_link; ?>">
          <?php echo $donate_cta_button_text; ?>
      </a>
  </div>

</section>
