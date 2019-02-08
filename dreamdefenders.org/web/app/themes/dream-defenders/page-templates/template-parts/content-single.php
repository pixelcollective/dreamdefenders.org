<?php
/**
 * @package some_like_it_neat
 */

$tag_list = get_the_tag_list( '', __( ', ', 'some-like-it-neat' ) );

$bg_image = get_the_post_thumbnail_url();

$blog_date = get_the_date( 'j M' );

$blog_author = get_the_author_meta('display_name');

$shared_path = 'page-templates/template-parts/shared/shared';
$campaign_template_slug = 'page-templates/template-campaign.php';
$petition_template_slug = 'page-templates/template-petition.php';
$newsletter_template_slug = 'page-templates/template-newsletter.php';
$donation_template_slug = 'page-templates/template-donation.php';
?>

<div class="blog-content-container">
  <div class="blog-content">

    <div style="position: relative">
        <?php if(get_page_template_slug() == $campaign_template_slug) {
          get_template_part($shared_path, 'hero');
        } else { get_template_part($shared_path, 'post-hero');
        } ?>
      </div>
      
      <div style="position: relative">
        <?php if(get_page_template_slug() == $petition_template_slug) {
              get_template_part($shared_path, 'petition');
        } else if(get_page_template_slug() == $petition_template_slug) {
          get_template_part($shared_path, 'petition');
        } else { get_template_part($shared_path, 'post-body');
            } ?>

        <?php if (get_page_template_slug() == $donation_template_slug ) { ?>

          <div style="position: relative">
            <?php get_template_part($shared_path, 'donation'); ?>
          </div>
        <?php } ?>
      </div>

      <?php if (get_page_template_slug() != $donation_template_slug) { ?>
        <div style="position: relative">
          <?php get_template_part($shared_path, 'donate-cta'); ?>
        </div>

        <div class="blog-tags">
          <?php if ($tag_list) : ?>
            <p><strong>TAGS:</strong><?php echo $tag_list ?></p>
          <?php endif; ?>
        </div>
      <?php } ?>

  </div><!-- blog-content -->
</div><!-- blg-content-container -->



