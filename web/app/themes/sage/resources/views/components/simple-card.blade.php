@if($card->title && $card->url)
  <div class="p-2 w-full md:w-1/4">
    <div class="bg-gray-100 h-96 @if($card->image) bg-cover bg-image-{!! $card->id !!} @endif">
      <div class="bg-black-500 hover:bg-black-200 transition transition-all w-full h-full p-1 content-center flex flex-col">
        <a class="h-full w-full" href="{!! $card->url !!}">
          <h3 class="px-2 break-all font-display text-white text-2xl text-bold h-full w-full">
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
