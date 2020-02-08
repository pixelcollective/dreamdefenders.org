<div class="relative bg-black">
  <div class="absolute top-0 right-0 z-10">
    <div class="relative hidden w-full h-full p-4 md:block" style="top: -3rem; right: 1.4rem;">
      <div class="absolute top-0 left-0 right-0 select-none">
        <img src="@asset('images/duct-tape.png')" />
      </div>

      <div class="relative text-5xl font-bold uppercase select-none font-display" style="transform: rotate(-2deg); top: -.5rem;">
        @thedreamdefenders
      </div>
    </div>
  </div>

  <div class="flex flex-row flex-wrap flex-auto flex-grow">
    @foreach($grams as $row)
      @foreach($row as $gram)
        <a data-instagram="{!! $gram->id !!}" href="{!! $gram->url !!}" class="relative inline-block w-full overflow-hidden sm:w-1/2 lg:w-1/3 h-128 sm:h-96 bg-black-100">
          <img instagram-id="{!! $gram->id !!}" title="{{ strip_tags($gram->caption) }}" alt="Image from @thedreamdefenders on Instagram" src="{!! $gram->image !!}" class="absolute object-cover w-full h-full mx-auto" />
          <div class="absolute top-0 bottom-0 left-0 right-0 w-full h-full pointer-events-none overlay"></div>
        </a>
      @endforeach
    @endforeach
  </div>
</div>
