@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
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
