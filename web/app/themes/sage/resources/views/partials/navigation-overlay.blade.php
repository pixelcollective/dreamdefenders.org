<div class="fixed top-0 bottom-0 left-0 right-0 z-50 flex flex-col items-center hidden h-0 bg-black justify-top w-100 nav-overlay">
  <nav class="z-50 flex flex-col items-center justify-between w-full overflow-hidden transition nav">
    <div class="w-full">
      @alert(['label' => 'Work-in-progress', 'build' => env(GIT_SHA)]) Product is under active development. @endalert
    </div>

    <div class="container text-black">
      <div class="flex flex-row justify-between w-full">
        <div class="flex items-center justify-middle">
          <a class="w-32 my-4 ml-0 no-underline blend-difference nav-logo hover:no-underline" href="/" title="Dream Defenders">
            @svg('logo', 'w-full fill-current blend-difference', ['height' => 64])
          </a>
        </div>

        <div class="items-center justify-between text-white align-middle blend-difference hidden md:flex">
          <a class="nav-social-icon p-3 text-white no-underline blend-difference hover:relative hover:top-1 hover:no-underline hover:bg-white rounded rounded-full hover:text-black transition-all transition" href="/" title="Dream Defenders">
            @brands('facebook-f', 'w-full fill-current', ['width' => 28, 'height' => 28])
          </a>

          <a class="nav-social-icon p-3 text-white no-underline blend-difference hover:relative hover:top-1 hover:no-underline hover:bg-white rounded rounded-full hover:text-black transition-all transition" href="/" title="Dream Defenders">
            @brands('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
          </a>

          <a class="nav-social-icon p-3 text-white no-underline blend-difference hover:relative hover:top-1 hover:no-underline hover:bg-white rounded rounded-full hover:text-black transition-all transition" href="/" title="Dream Defenders">
            @brands('instagram', 'w-full fill-current', ['width' => 28,'height' => 28])
          </a>

          <a class="nav-social-icon p-3 text-white no-underline blend-difference hover:relative hover:top-1 hover:no-underline hover:bg-white rounded rounded-full hover:text-black transition-all transition" href="/" title="Dream Defenders">
            @solid('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
          </a>

          <button class="hover-scale-up px-6 py-2 mx-4 text-sm text-black uppercase bg-white border border-white rounded blend-difference" title="Join" aria-label="Join">
            Join
          </button>

          <button class="hover-scale-up px-6 py-2 ml-0 text-sm text-white uppercase border border-white rounded blend-difference" title="Donate" aria-label="Donate">
            Donate
          </button>
        </div>

        <div class="w-32 flex items-center justify-center align-middle">
          <button class="text-white nav-disable blend-difference" title="Close menu" aria-label="Close menu">
            <svg class="w-full ml-4 mr-2 fill-current blend-difference" width="26" height="26">
              <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <div class="w-full mt-8">
    <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
      <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
      <h2 class="relative inline px-4 text-sm font-thin text-center text-white bg-black md:text-md" style="top: -0.9rem">
        About Us
      </h2>
    </div>

    <nav class="relative flex flex-col text-center justify-middle" style="top: -0.75rem">
      <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="hover-scale-up text-2xl text-white uppercase md:text-4xl font-display" href="#">Our Story</a>
      <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="hover-scale-up text-2xl text-white uppercase md:text-4xl font-display" href="#">Ideology</a>
      <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="hover-scale-up text-2xl text-white uppercase md:text-4xl font-display" href="#">Squadds</a>
    </nav>
  </div>

  <div class="w-full mt-4">
    <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
      <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
      <h2 class="relative inline px-4 text-sm font-thin text-center text-white bg-black md:text-md" style="top: -0.9rem">
        Our Vision
      </h2>
    </div>

    <nav class="relative flex flex-col text-center justify-middle" style="top: -0.75rem">
      <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="hover-scale-up text-2xl text-white uppercase md:text-4xl font-display" href="#">Freedom Papers</a>
      <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="hover-scale-up text-2xl text-white uppercase md:text-4xl font-display" href="#">Blog</a>
    </nav>
  </div>

  <div class="w-full mt-4">
    <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
      <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
      <h2 class="relative inline px-4 text-sm font-thin text-center text-white bg-black md:text-md" style="top: -0.9rem">
        Our Work
      </h2>
    </div>

    <nav class="relative flex flex-col text-center justify-middle" style="top: -0.75rem">
      <a hoverfx fx-d="800" fx-on-s="1.1" fx-off-s="1" fx-on-t-y="-3px" fx-off-t-y="0px" class="hover-scale-up text-2xl text-white uppercase md:text-4xl font-display" href="#">Projects</a>
    </nav>
  </div>
</div>
