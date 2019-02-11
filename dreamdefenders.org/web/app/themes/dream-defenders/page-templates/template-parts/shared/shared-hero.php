<?php
  // style vars
  $background_image   = get_field('hero_background_image');
  $background_color   = get_field('hero_background_color');
  $overlay_opacity    = ((int)get_field('hero_overlay_opacity') / 100);
  $button_color       = get_field('hero_button_color');
  $desktop_alignment  = get_field('hero_desktop_alignment');
  $mobile_alignment   = get_field('hero_mobile_alignment');
  $content_alignment  = $desktop_alignment. ' '.  $mobile_alignment;

  // content vars
  $headline   = get_field('hero_headline');
  $subheading = get_field('hero_subheading');
  $cta_text   = get_field('hero_cta_text');
  $cta_link   = get_field('hero_cta_link');

  $white_btn_text = ".cta-button:hover { color: #ffffff; }";
?>


<style type="text/css">
  /*  redefine CSS vars set in _hero.scss
      according to ACF selected values
  */
  .hero-containter {
    --hero-button-color: <?php echo $button_color; ?>;
    --hero-overlay-color: rgba(0,0,0,<?php echo $overlay_opacity; ?>);
  }

  <?php if($button_color == "#000000") {
    echo $white_btn_text;
  } ?>

</style>


<?php if($background_image) {
    ?>
    <section class="hero-containter" style="background-image: url(<?php echo $background_image; ?>);">
<?php } else {
    ?>
    <section class="hero-containter" style="background-color: <?php echo $background_color; ?>;">
        <?php
}?>

  <div class="hero-overlay"></div>

  <div class="hero-content <?php echo $content_alignment; ?>">
      <h1 class="hero-headline"><?php echo $headline; ?></h1>
      <h3 class="hero-subheading"><?php echo $subheading; ?></h3>
      <?php if($cta_text) {
      ?>
      <a class="cta-button" href="<?php echo $cta_link; ?>">
          <?php echo $cta_text; ?>
      </a>
      <?php } ?>
  </div>

</section>
