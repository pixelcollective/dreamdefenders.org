<div class="overlay-modal fixed absolute top-0 left-0 right-0 bottom-0 h-screen overflow-hidden z-50 hidden">
  <div class="bg-black-700 flex-col flex-wrap flex content-center justify-center h-full w-full overflow-hidden">
    <div class="text-right w-7/8 md:w-2/5 flex h-8 mx-auto inline-block overflow-hidden">
      <button modal="overlay" class="overflow-hidden focus:outline-none outline-none w-full inline-block justify-end text-right h-8 text-white-700 hover:text-white transition transition-all">
        @solid('times', 'fill-current blend-difference text-right inline-block justify-end', ['height' => '24px'])
      </button>
    </div>

    <div class="bg-black overlay-content border border-white-200 w-7/8 md:w-2/5 flex flex-wrap content-center justify-center p-8">
      <div class="flex flex-col content-center justify-center">
        <img src="@asset('images/305-miami.png')" class="block object-contain px-24 py-0" />
        <span class="text-2xl font-display text-white text-center uppercase font-bold tracking-wider mb-8">
          Join Our Mailing List
        </span>

        <span class="text-2xl font-display text-white text-center uppercase font-bold tracking-wider w-full border border-white-400 p-8">
          [Form]
        </span>
      </div>
    </div>
  </div>
</div>