
<nav class="nav fixed z-50 flex flex-col items-center justify-between w-full overflow-hidden transition">
  <div class="w-full">
    @alert(['label' => 'Work-in-progress', 'build' => env(GIT_SHA)])
      Product is under active development.
    @endalert
  </div>

  <div class="container text-black">
    <div class="flex flex-row justify-between w-full">
      <div class="flex items-center justify-middle">
        <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="w-32 my-4 ml-0 no-underline blend-difference nav-logo hover:no-underline" href="/" title="Dream Defenders">
          @svg('logo', 'w-full fill-current blend-difference', ['height' => 64])
        </a>
      </div>

      <div class="items-center justify-between text-white align-middle blend-difference hidden md:flex">
        <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="p-3 text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="/" title="Dream Defenders">
          @brands('facebook-f', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="p-3 text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="/" title="Dream Defenders">
          @brands('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="p-3 align-middle justify-center text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="/" title="Dream Defenders" style="overflow-x: hidden;">
          @brands('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
        </a>

        <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="p-3 text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="/" title="Dream Defenders">
          @solid('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
        </a>

        <button hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="px-6 py-2 mx-4 text-sm text-black uppercase bg-white border border-white rounded blend-difference" title="Join" aria-label="Join">
          Join
        </button>

        <button hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="px-6 py-2 ml-0 text-sm text-white uppercase border border-white rounded blend-difference" title="Donate" aria-label="Donate">
          Donate
        </button>
      </div>

      <div class="w-32 flex items-center justify-center align-middle">
        <button class="text-white nav-toggle blend-difference" title="Open menu" aria-label="Open menu">
          <svg class="w-full ml-4 mr-2 fill-current blend-difference" width="26" height="26">
            <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>
