
<nav class="fixed z-50 flex flex-col items-center justify-between w-full overflow-hidden nav">
  <div class="w-full">
    @alert(['label' => 'Work-in-progress', 'build' => 'fksjfodsjfoishdfs']) Product is under active development. @endalert
  </div>

  <div class="container">
    <div class="flex flex-row justify-between w-full">
      <div class="flex items-center text-white">
        <a class="text-white no-underline nav-logo hover:text-white hover:no-underline" href="/" title="Dream Defenders">
          @svg('logo', 'p-4')
        </a>
      </div>

      <div class="flex items-center text-white border rounded">
        <button class="nav-toggle" title="Open menu" aria-label="Open menu">
          <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" width="32" height="32" viewBox="0 0 32 32">
            <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>
