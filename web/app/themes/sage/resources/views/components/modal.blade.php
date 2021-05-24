<div x-data="{show: {!! $show ? 'true':'false' !!}}" :class="{'opacity-0 ease-out duration-300 hidden sm:hidden md:hidden lg:hidden': show == false}" class="fixed inset-x-0 top-0 bottom-0 left-0 right-0 z-50 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center">
  <div x-data="{show: {!! $show ? 'true':'false' !!}}" :class="{'opacity-0 ease-out duration-300 hidden sm:hidden md:hidden lg:hidden': show == false}" class="fixed inset-0 block transition-opacity duration-200 ease-in opacity-100 pointer-events-none">
    <div class="absolute inset-0 bg-gray-800 opacity-75 pointer-events-none"></div>
  </div>

  <div @click.away="{show = false}" :class="{'opacity-0 ease-in duration-200 hidden sm:hidden md:hidden lg:hidden opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95': show == false}" x-transition-initial="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" style="z-index: 1000;" class="relative px-4 pt-5 pb-4 overflow-hidden transition-all transform translate-y-0 bg-black rounded-lg shadow-xl opacity-100 pointer-events-auto z-100 sm:max-w-lg sm:w-full sm:p-6 sm:scale-100" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div>
      <div class="flex items-center justify-center w-12 h-12 mx-auto rounded-full bg-yellow-default">
      <svg class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
      </svg>
    </div>
      <div class="mt-3 text-center sm:mt-5">
        <h3 class="text-2xl italic font-bold leading-6 tracking-wider text-white" id="modal-headline">
          {!! $title !!}
        </h3>

        <div class="mt-2">
          <p class="leading-5 text-left text-white text-md">
            {!! $description !!}
          </p>
        </div>
      </div>
    </div>

    <div class="mt-8 pointer-events-auto sm:mt-6">
      <span class="flex w-full rounded-none shadow-sm hover:rounded-md sm:col-start-2">
        <a href="{!! $buttonHref ?? '#' !!}" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-bold leading-6 text-white uppercase transition-all transition duration-150 ease-in-out bg-black border border-white rounded-none shadow-sm hover:cursor-pointer hover:bg-yellow-defaulthover:radius hover:text-black hover:rounded-md hover:border-transparent focus:outline-none focus:border-yellow-700 focus:shadow-outline-yellow sm:text-sm sm:leading-5">
          {!! $buttonText ?? '' !!}
        </a>
      </span>
    </div>
  </div>
</div>
