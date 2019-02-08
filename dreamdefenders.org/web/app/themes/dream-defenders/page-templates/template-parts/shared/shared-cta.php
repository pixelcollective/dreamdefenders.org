<?php
  // style vars
  $cta_background_image   = get_field('cta_background_image');
  $cta_background_color   = get_field('cta_background_color');
  $cta_overlay_opacity    = ((int)get_field('cta_overlay_opacity') / 100);
  $cta_button_color       = get_field('cta_button_color');
  $cta_desktop_alignment  = get_field('cta_desktop_alignment');
  $cta_mobile_alignment   = get_field('cta_mobile_alignment');
  $cta_content_alignment  = $cta_desktop_alignment. ' '.  $cta_mobile_alignment;
  
  // content vars
  $cta_headline   = get_field('cta_headline');
  $cta_subheading = get_field('cta_subheading');
  $cta_text       = get_field('cta_text');
  $cta_button_text   = get_field('cta_button_text');
  $cta_button_link   = get_field('cta_button_link');

  $cta_white_btn_text = ".cta-button:hover { color: #ffffff; }";
?>


<style type="text/css">  
  /*  redefine CSS vars set in _cta.scss
      according to ACF selected values 
  */
  .cta-containter {
    --cta-button-color: <?php echo $cta_button_color; ?>;
    --cta-overlay-color: rgba(0,0,0,<?php echo $cta_overlay_opacity; ?>);
  }

    <?php if($cta_button_color == "#000000") {
      echo $cta_white_btn_text;
    } ?>
  </style>
  


<?php if($cta_background_image) {
    ?>
    <section class="cta-containter" style="background-image: url(<?php echo $cta_background_image; ?>);">
<?php } else {
    ?>
    <section class="cta-containter" style="background-color: <?php echo $cta_background_color; ?>;">
        <?php
}?>

  <div class="cta-overlay"></div>
  
  <div class="cta-content <?php echo $cta_content_alignment; ?>">
      <h2 class="headline"><?php echo $cta_headline; ?></h2>
      <h4 class="subheading"><?php echo $cta_subheading; ?></h4>
      <p class="text"><?php echo $cta_text ?></p>
      <?php if($cta_text) { ?>
      <a class="cta-button" href="<?php echo $cta_button_link; ?>">
          <?php echo $cta_button_text; ?>
      </a>
      <?php } ?>
  </div>

</section>
