
<nav class="fixed z-50 flex flex-col items-center justify-between w-full overflow-hidden transition nav">
  <div class="w-full">
    @alert(['label' => 'Work-in-progress', 'build' => env(GIT_SHA)]) Product is under active development. @endalert
  </div>

  <div class="container text-black">
    <div class="flex flex-row justify-between w-full">
      <div class="flex items-center">
        <a class="my-4 ml-0 mr-4 no-underlin blend-difference nav-logo hover:no-underline" href="/" title="Dream Defenders">
          @svg('logo', 'w-full pr-4 fill-current blend-difference', [
            'height' => 64,
          ])
        </a>
      </div>

      <div class="flex items-center justify-around text-white align-middle blend-difference">
        <a class="text-white no-underline blend-difference hover:no-underline" href="/" title="Dream Defenders">
          @brands('facebook', 'w-full px-2 fill-current blend-difference', [
            'width'  => 28,
            'height' => 28,
          ])
        </a>

        <a class="text-white no-underline blend-difference hover:no-underline" href="/" title="Dream Defenders">
          @brands('twitter', 'w-full px-2 fill-current blend-difference', [
            'width'  => 28,
            'height' => 28,
          ])
        </a>

        <a class="text-white no-underline blend-difference hover:no-underline hover:bg-black hover:text-white transition-all transition-fast transition" href="/" title="Dream Defenders">
          @brands('instagram', 'w-full px-2 fill-current', [
            'width'  => 28,
            'height' => 28,
          ])
        </a>

        <a class="text-white no-underline blend-difference hover:no-underline" href="/" title="Dream Defenders">
          @solid('envelope', 'w-full px-2 fill-current blend-difference', [
            'width'  => 28,
            'height' => 28,
          ])
        </a>

        <button class="px-6 py-2 mx-4 text-sm text-black uppercase bg-white border border-black rounded blend-difference" title="Join" aria-label="Join">
          Join
        </button>

        <button class="px-6 py-2 ml-0 mr-4 text-sm text-white uppercase border border-white rounded blend-difference hover:bg-transparent hover:text-white" title="Donate" aria-label="Donate">
          Donate
        </button>
      </div>

      <div class="flex items-center align-middle">
        <button class="text-white nav-toggle blend-difference" title="Open menu" aria-label="Open menu">
          <svg class="w-full ml-4 mr-2 fill-current blend-difference" width="26" height="26">
            <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>
