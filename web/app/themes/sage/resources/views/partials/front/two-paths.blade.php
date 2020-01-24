<div class="bg-black">
  <div class="container mx-auto">
    <div class="flex flex-col justify-around lg:flex-row">
      <div class="flex-1 hidden w-full overflow-hidden text-black lg:w-1/5">
        @svg('waves-triple', 'fill-current max-w-4/5')
      </div>

      <div class="w-full lg:w-3/5">
        <h2 class="text-4xl font-bold text-center text-white">There are two paths</h2>
      </div>

      <div class="flex-1 hidden overflow-hidden text-white lg:w-1/5">
        @svg('waves-triple', 'fill-current max-w-4/5')
      </div>
    </div>
  </div>

  <div class="relative flex flex-col justify-around h-64 lg:flex-row">
    <div class="flex-1 hidden w-full overflow-hidden text-white bg-white lg:inline-block lg:w-1/5">
      {{-- foo --}}
    </div>

    <div class="flex-1 hidden overflow-hidden text-white lg:inline-block lg:w-1/5"></div>

    <div class="absolute w-8 text-center text-white uppercase" style="top: 25%; left: 50%; right: 50%;">
      {{-- baz --}}
    </div>
  </div>
</div>

