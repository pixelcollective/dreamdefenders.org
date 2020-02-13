<div class="p-2 w-full md:w-1/4">
  <div class="bg-gray-100 h-96
    shadow shadow-md hover:shadow-lg transition transition-all hover:bg-blue-800
    @if($card->image)
      bg-cover bg-image-{!! $card->id !!}
    @else
      bg-{!! rand(0, 10) > 5 ? 'blue-600' : 'grey-500' !!}
    @endif">

    @if($card->image)
      <div class="bg-black-500 hover:bg-yellow-800 transition transition-all w-full h-full p-1 content-center flex flex-col">
    @endif

      <a class="h-full w-full" href="{!! $card->url !!}">
        <h3 class="px-2 break-all font-display text-white text-4xl text-bold h-full w-full">
          {!! $card->title !!}
        </h3>
      </a>
    @if($card->image)
      </div>
    @endif
  </div>
</div>

@if($card->image)
  @style
    .bg-image-{!! $card->id !!} {
      background-image: url({!! $card->image !!});
    }
  @endstyle
@endif