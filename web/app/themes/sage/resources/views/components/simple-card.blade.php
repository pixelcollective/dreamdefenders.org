@if($card->title && $card->url)
  <div class="p-2 w-full md:w-1/4">
    <div class="p-1 bg-gray-100 h-64">
      <a class="h-full w-full" href="{!! $card->url !!}">
        <h3 class="font-display text-2xl text-bold h-full w-full">
          {!! $card->title !!}
        </h3>
      </a>
    </div>
  </div>
@endif
