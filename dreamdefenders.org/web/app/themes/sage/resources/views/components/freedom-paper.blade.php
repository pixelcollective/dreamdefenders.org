{{-- Hero Banner --}}
@group('paper')
<section
    class="
      hero hero__bg-center hero__overlay heroic
      darken has-background-dim-@sub('freedompaper__overlay_opacity')"
    style="
      background-image: url(
        @hassub('freedompaper__image') @sub('freedompaper__image', 'url')
        @else {!! get_the_post_thumbnail_url(get_the_id(), 'medium_large') !!} @endsub
      );
      @hassub('freedompaper__image_fixed') background-position: fixed; @endsub"
>
    <div class="hero__content inner__content-contained">

      {{-- Heading --}}
      @hassub('freedompaper__heading')
        <h1 class="hero__heading hero__heading-paired
          @hassub('freedompaper__heading_alignment') @sub('freedompaper__heading_alignment') @endsub">
          @sub('freedompaper__heading')
        </h1>
      @else
        <h1 class="hero__heading hero__heading-paired">@title</h1>
      @endsub

      {{-- Subheading --}}
      @hassub('freedompaper__subheading')
        <h2 class="hero__subheading subheading">@sub('freedompaper__subheading')</h2>
      @endsub


      {{-- Excerpt --}}
      @hassub('freedompaper__excerpt')
        <div class="wp-blocks hero__excerpt">@sub('freedompaper__excerpt')</div>
      @endsub

      {{-- Call-to-action Button --}}
      @hassub('freedompaper__download')
        <a class="hero__button" href="@sub('freedompaper__download', 'url')">
          Download
        </a>
      @endsub

    </div>
  @endgroup
</section>