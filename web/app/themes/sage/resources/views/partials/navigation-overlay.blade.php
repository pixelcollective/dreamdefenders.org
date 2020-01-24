<div class="fixed top-0 bottom-0 left-0 right-0 z-50 flex flex-col items-center hidden h-0 bg-black justify-top w-100 nav-overlay">

  <nav class="flex flex-col items-center justify-between w-full overflow-hidden transition nav">
    <div class="hidden w-full">
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
          <button class="text-white nav-disable blend-difference" title="Close menu" aria-label="Close menu">
            @solid('times', 'w-full px-2 fill-current blend-difference', [
              'width'  => 28,
              'height' => 28,
            ])
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
      <a class="text-2xl text-white uppercase md:text-4xl font-display" href="#">Our Story</a>
      <a class="text-2xl text-white uppercase md:text-4xl font-display" href="#">Ideology</a>
      <a class="text-2xl text-white uppercase md:text-4xl font-display" href="#">Squadds</a>
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
      <a class="text-2xl text-white uppercase md:text-4xl font-display" href="#">Freedom Papers</a>
      <a class="text-2xl text-white uppercase md:text-4xl font-display" href="#">Blog</a>
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
      <a class="text-2xl text-white uppercase md:text-4xl font-display" href="#">Projects</a>
    </nav>
  </div>
</div>
