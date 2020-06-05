@if($card->title && $card->url)
  <div class="w-full p-2 md:w-1/4">
    <div class="bg-gray-100 h-96 @if($card->image) bg-cover bg-image-{!! $card->id !!} @endif">
      <div class="flex flex-col content-center w-full h-full p-1 bg-black-500 hover:bg-black-200 transition transition-all">
        <a class="w-full h-full" href="{!! $card->url !!}">
          <h3 class="w-full h-full px-2 text-4xl text-white break-all font-display text-bold">
            {!! $card->title !!}
          </h3>
        </a>
      </div>
    </div>
  </div>
@endif

@if($card->image)
  @style
    .bg-image-{!! $card->id !!} {
      background-image: url({!! $card->image !!});
    }
  @endstyle
@endif
