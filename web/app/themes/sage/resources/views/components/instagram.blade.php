<div class="py-8 bg-black">
  <div class="container">
    <div class="flex flex-row flex-wrap flex-auto flex-grow">
      @foreach($grams as $row)
        @foreach($row as $gram)
          <a data-grow="{!! $gram->id !!}" href="{!! $gram->url !!}" class="relative inline-block w-full overflow-hidden sm:w-1/3 h-128 sm:h-96 bg-black-100">
            <img gram="{!! $gram->id !!}" src="{!! $gram->image !!}" class="absolute object-cover w-full h-full mx-auto" />
            <div class="absolute top-0 bottom-0 left-0 right-0 w-full h-full pointer-events-none overlay"></div>
          </a>
        @endforeach
      @endforeach
    </div>
  </div>
</div>