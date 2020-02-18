@if(isset($image) && isset($image->url))
  <div class="{!! isset($classes) ? $classes : 'w-full' !!}">
    <picture class="w-full">
      @if(isset($image->sizes) && is_array($image->sizes) && !empty($image->sizes))
        @foreach(array_reverse($image->sizes) as $src)
          <source
            srcset="{!! $src['url'] !!}"
            sizes="(min-width: {!! $src['width'] !!}px)"
          />
        @endforeach
      @endif

      <img class="w-full object-cover" src="{{ $image->url }}"
        @if(isset($image->alt) && $image->alt)
          alt="{{ $image->alt }}"
        @endif

        @if(isset($image->title) && $image->title))
          title="{{ $image->title }}"
        @endif

        @if(isset($image->sizes) && is_array($image->sizes) && !empty($image->sizes))
          srcset="@foreach($image->sizes as $src) {!! "{$src['url']} {$src['width']}w, "  !!} @endforeach"
          sizes="@foreach($image->sizes as $src) (min-width: {!! $src['width'] !!}px) {!! $src['width'] !!}px, @endforeach"
        @endif
      />
    </picture>
  </div>
@endif

@isset($debug)
  @if($debug)
    @dump($image)
  @endif
@endisset
