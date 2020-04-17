<div class="fixed absolute top-0 bottom-0 left-0 right-0 z-50 hidden h-screen overflow-hidden overlay-modal">
  <div class="flex flex-col flex-wrap content-center justify-center w-full h-full overflow-hidden bg-black-700">
    <div class="flex inline-block h-8 mx-auto overflow-hidden text-right w-7/8 md:w-2/5">
      <button modal="overlay" class="justify-end inline-block w-full h-8 overflow-hidden text-right outline-none focus:outline-none text-white-700 hover:text-white transition transition-all">
        @svg('times', 'fill-current blend-difference text-right inline-block justify-end', ['height' => '24px'])
      </button>
    </div>

    <div class="flex flex-wrap content-center justify-center p-8 bg-black border overlay-content border-white-200 w-7/8 md:w-2/5">
      <div class="flex flex-col content-center justify-center">
        <img src="@asset('images/305-miami.png')" class="block object-contain px-24 py-0" />
        <span class="mb-8 text-2xl font-bold tracking-wider text-center text-white uppercase font-display">
          Join Our Mailing List
        </span>

        <span class="w-full p-8 text-2xl font-bold tracking-wider text-center text-white uppercase border font-display border-white-400">
          [Form]
        </span>
      </div>
    </div>
  </div>
</div>
