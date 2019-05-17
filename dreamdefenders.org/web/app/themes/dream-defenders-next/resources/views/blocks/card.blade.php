<div class="cards">
  <article class="card">

    @isset($block->attributes->mediaURL)
      <a href="#">
        <img class="card__image" src="{!! $block->attributes->mediaURL !!}">
      </a>
    @endisset

    <header class="card__header">
      @isset($block->attributes->heading)
        <div class="card__header__heading"><a href="#">{!! $block->attributes->heading !!}</a></div>
      @endisset
      @isset($block->attributes->date)
        <div class="card__header__date">{!! $block->attributes->date !!}</div>
      @endisset
    </header>

    <div class="card__content">
      @isset($block->attributes->copy)
        <p class="card__content__copy">{!! $block->attributes->copy !!}</p>
      @endisset
    </div>

    {{-- footer --}}
    @isset($block->attributes->attribution_name)
      <footer class="card__footer">

        {{-- link --}}
        @isset($block->attributes->link_href)
          <a class="card__footer__profile" href="{!! $block->attributes->link_href !!}">
        @endisset
          @isset($block->attributes->attribution_mediaURL)
            <img alt="Placeholder" class="card__footer__profile-image" src="{!! $block->attributes->attribution_mediaURL !!}">
          @endisset
          <p class="name">
            {!! $block->attributes->attribution_name !!}
          </p>
        @isset($block->attributes->link_href)</a>@endisset

        @isset($block->attributes->link_href)
          <a class="card__footer__link" href="{!! $block->attributes->link_href !!}">
            @isset($block->attributes->link_text)<span class="hidden">Like</span>@endisset
            @isset($block->attributes->link_icon)<i class="{!! $block->attributes->link_icon"></i>@endisset
          </a>
        @endisset
      </footer>
    @endisset
    {{-- / footer --}}
  </article>
</div>
