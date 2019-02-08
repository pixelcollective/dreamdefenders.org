<?php
  // style vars
  $post_hero_background_image   = get_field('post_hero_background_image');
  $post_hero_background_color   = get_field('post_hero_background_color');
  $post_hero_overlay_opacity    = ((int)get_field('post_hero_overlay_opacity') / 100);
  $post_hero_desktop_alignment  = get_field('post_hero_desktop_alignment');

  $post_hero_content_alignment  = $post_hero_desktop_alignment;
  
  // content vars
  $post_hero_headline   = get_field('post_hero_headline');
  $post_hero_subheading = get_field('post_hero_subheading');

?>

<style type="text/css">  
  /*  redefine CSS vars set in _post-hero.scss
      according to ACF selected values 
  */
  .post-hero-containter {
    --post-hero-overlay-color: rgba(0,0,0,<?php echo $post_hero_overlay_opacity; ?>);
  }

</style>


<?php if($post_hero_background_image) {
    ?>
    <section class="post-hero-containter" style="background-image: url(<?php echo $post_hero_background_image; ?>);">
<?php } else {
    ?>
    <section class="post-hero-containter" style="background-color: <?php echo $post_hero_background_color; ?>;">
        <?php
}?>

  <div class="post-hero-overlay"></div>
  
  <div class="post-hero-content <?php echo $post_hero_content_alignment; ?>">
      <h3 class="post-hero-subheading"><?php echo $post_hero_subheading; ?></h3>
      <h1 class="post-hero-headline"><?php echo $post_hero_headline; ?></h1>
  </div>

</section>
