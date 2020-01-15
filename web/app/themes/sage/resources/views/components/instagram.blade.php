@foreach($grams as $row)
  <div class="flex flex-col md:flex-row">
    @foreach($row as $gram)
      <a data-grow="{!! $gram->id !!}" href="{!! $gram->url !!}" class="inline-block w-full md:w-1/3 h-96 relative overflow-hidden">
        <img gram="{!! $gram->id !!}" src="{!! $gram->image !!}" class="mx-auto absolute h-full w-full object-cover" />
      </a>
    @endforeach
  </div>
@endforeach
