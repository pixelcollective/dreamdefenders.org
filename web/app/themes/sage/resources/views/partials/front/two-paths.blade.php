<div class="bg-black">
  <div class="container mx-auto">
    <div class="flex flex-col justify-around lg:flex-row">
      <div class="flex-1 hidden w-full overflow-hidden text-black lg:w-1/5">
        @svg('waves-triple', 'fill-current max-w-4/5')
      </div>

      <div class="w-full lg:w-3/5">
        <h2 class="text-4xl font-bold text-center text-white">
          There are two paths
        </h2>
      </div>

      <div class="flex-1 hidden overflow-hidden text-white lg:w-1/5">
        @svg('waves-triple', 'fill-current max-w-4/5')
      </div>
    </div>
  </div>

  <div class="relative h-64">
    <div class="two-paths-left hidden md:inline-block h-64 w-1/2 overflow-hidden text-white bg-white">
      {{-- foo --}}
    </div>

    <div class="two-paths-right hidden md:inline-block h-64 w-auto max-w-1/2 overflow-hidden text-white bg-black">
      {{-- baz --}}
    </div>
  </div>
</div>

