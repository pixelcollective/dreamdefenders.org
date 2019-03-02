{{-- Hero Banner --}}
<section
  @group('header__image')
    class="
      hero hero__bg-center hero__overlay heroic
      darken has-background-dim-@sub('header__overlay_opacity')"
    style="
      background-image: url(
        @hassub('header__bg') @sub('header__bg', 'url')
        @else {!! get_the_post_thumbnail_url(get_the_id(), 'medium_large') !!} @endsub
      );
      @hassub('header__bg_fixed') background-position: fixed; @endsub"
  @endgroup
>

  @group('header__content')
    <div class="hero__content inner__content-contained">

      {{-- Heading --}}
      @hassub('header__heading')
        <h1 class="hero__heading hero__heading-paired
          @hassub('header__heading_alignment') @sub('header__heading_alignment') @endsub">
          @sub('header__heading')
        </h1>
      @else
        <h1 class="hero__heading hero__heading-paired">@title</h1>
      @endsub

      {{-- Subheading --}}
      @hassub('header__subheading')
        <h2 class="hero__subheading subheading">@sub('header__subheading')</h2>
      @endsub

      {{-- Call-to-action Button --}}
      @hassub('header__cta_url')
        <a class="hero__button" href="@sub('header__cta_url')">
          @hassub('header__cta_text') @sub('header__cta_text') @endsub
        </a>
      @endsub

    </div>
  @endgroup
</section>