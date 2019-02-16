{{--

  Template Name: Full-Width, Home

--}}
@extends('layouts.app')

{{--

  template-name: home

  @todo add blade partials to components

  components.call-to-action.blade.php
  1. get_template_part(shared_path, 'hero') ✅
  2. get_template_part(shared_path, 'cta') ✅
  3. get_template_part(shared_path, 'donate-cta') ✅

  still #todos
  get_template_part(shared_path, 'newsletter')
  echo do_shortcode('[instagram-feed]')

--}}

@section('donate-call-to-action')
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
@endsection

@section('hero')
  @include(
    'components.call-to-action',
    array(
      'bg_img'     => get_field('hero_background_image'),
      'bg_color'   => get_field('hero_background_color'),
      'text'       => get_field('hero_cta_text'),
      'link'       => get_field('hero_cta_link'),
      'heading'    => get_field('hero_headline'),
      'subheading' => get_field('hero_subheading'),
      'alignment'  => get_field('hero_desktop_alignment') .' '. get_field('hero_mobile_alignment'),
    )
  )
@endsection

@section('content')
  <div class="home-content">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.page-header')
      @include('partials.content-page')
    @endwhile
  </div>
@endsection

@section('call-to-action')
  @include(
    'components.call-to-action',
    array(
      'bg_img'     => get_field('donate_cta_background_image'),
      'bg_color'   => get_field('donate_cta_background_color'),
      'text'       => get_field('donate_cta_text'),
      'link'       => get_field('donate_cta_link'),
      'heading'    => get_field('donate_cta_headline'),
      'subheading' => get_field('donate_cta_subheading'),
      'alignment'  => get_field('donate_cta_desktop_alignment') .' '. get_field('donate_cta_mobile_alignment'),
    )
  )
@endsection

@section('newsletter')
<section class="newsletter-container"
    style="background-color: {!! newsletter_background_color !!}">

    <div class="newsletter-content">
        <div class="newsletter-headline">
            <h2 style="color: {!! newsletter_heading_text_color !!}">{!! newsletter_heading !!}</h1>
        </div>
        <div class="newsletter-image hide-on-mobile" style="background-image: url({!! newsletter_image !!})"></div>
    </div>

    <div class="newsletter-content">
        <div class="newsletter-subheading">
            @if(newsletter_subheading)
                <h4 style="color: {!! newsletter_subheading_text_color !!}">
                    {!! $newsletter_subheading !!}
                </h4>
            @endif
        </div>
        <div class="newsletter-form" >
            @php echo do_shortcode("[salesforce form='form_id']") @endphp
        </div>
    </div>
</section>
@endsection
