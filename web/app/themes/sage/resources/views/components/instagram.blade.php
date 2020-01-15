@foreach($grams as $row)
  <div class="flex flex-col md:flex-row">
    @foreach($row as $gram)
      <a data-grow="{!! $gram->id !!}" href="{!! $gram->url !!}" class="inline-block w-full md:w-1/3 h-96 relative overflow-hidden bg-black-100">
        <img gram="{!! $gram->id !!}" src="{!! $gram->image !!}" class="mx-auto absolute h-full w-full object-cover" />
        <div class="absolute overlay pointer-events-none top-0 left-0 right-0 bottom-0 w-full h-full"></div>
      </a>
    @endforeach
  </div>
@endforeach
