@extends('layouts.app')

{{--

  @todo add blade partials to partials.components

  partials.components.call-to-action.blade.php
  1. get_template_part($shared_path, 'hero'); ✅
  2. get_template_part($shared_path, 'cta'); ✅
  3. get_template_part($shared_path, 'donate-cta'); ✅

  still #todos
  get_template_part($shared_path, 'newsletter');
  echo do_shortcode('[instagram-feed]')

--}}

@section('newsletter')

@endsection

@section('donate-call-to-action')

@endsection

@section('hero')
  @include(
    'partials.components.call-to-action',
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
    'partials.components.call-to-action',
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
