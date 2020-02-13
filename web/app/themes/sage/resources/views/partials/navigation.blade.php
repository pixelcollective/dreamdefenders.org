
<nav class="nav fixed z-50 flex flex-col items-center justify-between w-full overflow-hidden transition">
{{--   <div class="w-full">
    @alert(['label' => 'Work-in-progress', 'build' => env(GIT_SHA)])
      Product is under active development.
    @endalert
  </div> --}}

  <div class="container text-black">
    <div class="flex flex-row justify-between w-full">
      <div class="flex items-center justify-middle">
        <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="w-32 my-4 ml-0 no-underline blend-difference nav-logo hover:no-underline" href="/" title="Dream Defenders">
          @svg('logo', 'w-full fill-current blend-difference', ['height' => 64])
        </a>
      </div>

      <div class="items-center justify-between text-white align-middle blend-difference hidden md:flex">
        <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="/" title="Dream Defenders">
          @brands('facebook-f', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="/" title="Dream Defenders">
          @brands('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 align-middle justify-center text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="/" title="Dream Defenders" style="overflow-x: hidden;">
          @brands('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
        </a>

        <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="/" title="Dream Defenders">
          @solid('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
        </a>

        <button hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="px-6 py-2 mx-4 text-sm text-black uppercase bg-white border border-white rounded blend-difference" title="Join" aria-label="Join">
          Join
        </button>

        <button hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="px-6 py-2 ml-0 text-sm text-white uppercase border border-white rounded blend-difference" title="Donate" aria-label="Donate">
          Donate
        </button>
      </div>

      <div class="w-32 flex items-center justify-center align-middle">
        <button nav-toggle toggle-target="nav-overlay" class="focus:shadow-none focus:outline-none text-white mx-2 px-0 nav-toggle blend-difference" title="Open menu" aria-label="Open menu">
          @solid('bars',  'menu-icon menu-icon-open w-full fill-current blend-difference', ['width' => '26', 'height' => '26'])
          @solid('times', 'menu-icon menu-icon-close w-full fill-current blend-difference', ['width' => '0px', 'height' => '0px'])
        </button>
      </div>
    </div>

    <div class="nav-overlay w-full overflow-hidden">
      <div class="overlay-contents">
        <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
          <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black md:text-md" style="top: -0.9rem">
            About Us
          </span>
        </div>

        <nav class="relative flex flex-col text-center justify-middle flex-grow-0 w-64 mx-auto" style="top: -0.75rem">
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-2xl text-white uppercase md:text-4xl font-display" href="#">Our Story</a>
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-2xl text-white uppercase md:text-4xl font-display" href="#">Ideology</a>
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-2xl text-white uppercase md:text-4xl font-display" href="/squadds">Squadds</a>
        </nav>
      </div>

      <div class="w-full mt-4">
        <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
          <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black md:text-md" style="top: -0.9rem">
            Our Vision
          </span>
        </div>

        <nav class="relative flex flex-col text-center justify-middle w-64 mx-auto" style="top: -0.75rem">
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="text-2xl text-white uppercase md:text-4xl font-display" href="/freedom-papers">Freedom Papers</a>
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="text-2xl text-white uppercase md:text-4xl font-display" href="/blog">Blog</a>
        </nav>
      </div>

      <div class="w-full mt-4">
        <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
          <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black md:text-md" style="top: -0.9rem">
            Our Work
          </span>
        </div>

        <nav class="relative flex flex-col text-center justify-middle w-64 mx-auto" style="top: -0.75rem">
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="text-2xl text-white uppercase md:text-4xl font-display" href="/projects">Projects</a>
        </nav>
      </div>
    </div>
  </div>
</nav>
