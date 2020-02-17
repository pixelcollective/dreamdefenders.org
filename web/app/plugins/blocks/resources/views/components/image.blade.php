@if(isset($image) && isset($image->url))
  <div @if($classes) class="{!! $classes !!}"@endif>
      <img class="w-full"
        src="{{ $image->url }}"
        @isset($image->sizes)
          @if($image->sizes)
            @if(! empty($image->sizes))
              srcset="@foreach($image->sizes as $label => $size) {!! "{$size['url']} {$size['width']}w, "  !!} @endforeach"
              sizes="(max-width: {!! end($image->sizes)['width'] !!}) @foreach($image->sizes as $label => $size) {!! $size['width'] !!}px, @endforeach"
            @endif
          @endif
        @endisset
        @isset($image->alt) alt="{{ $image->alt }}" /> @endisset
  </div>
@endisset

@isset($debug)
  @if($debug)
    @dump($image)
  @endif
@endisset
