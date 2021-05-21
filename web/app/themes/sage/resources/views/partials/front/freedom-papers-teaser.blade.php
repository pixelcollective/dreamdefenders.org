<div class="relative flex flex-row flex-wrap justify-center pt-8 pb-32 bg-gradient-to-b from-white to-yellow-default md:pt-16">
    <div class="flex flex-col flex-wrap content-center justify-around w-4/5 px-4 mx-auto overflow-hidden md:flex-row">
      <div class="w-full pb-8 overflow-hidden text-center md:w-1/2 md:text-left md:pb-16">
        <img src="@asset('images/freedom-papers-art.png')" />
      </div>

      <div class="flex flex-col content-center self-center w-full px-2 overflow-hidden text-left align-middle md:w-1/2 md:align-end md:text-right">
        <a href="/freedom-papers" class="relative block w-full text-2xl font-bold uppercase font-display md:inline md:w-auto">
          @svg('arrow-right', 'inline h-12 w-12 relative top-0 left-0 right-0 hidden md:inline-block', ['width' => 32, 'height' => 32])
          <span class="absolute bottom-0 w-full border-b-4 border-blue-default freedom-papers-two-col__style-border-bottom"></span>
          <span class="w-full md:w-auto">Freedom Papers</span>
        </a>

        <p>What’s the future we are fighting for? The Freedom Papers illustrates our vision for a world that serves the everyday needs of its people - the one we all deserve. The Freedom Papers is our new north star.</p>
      </div>
    </div>
  <div class="flex flex-col flex-wrap content-center justify-center w-1/5">
    <img src="@asset('images/world-we-are-fighting-for.png')" class="top-0 w-3/5 mx-auto select-none md:w-1/5 sm:w-2/5 freedom-papers-two-col__world-we-are-fighting-for" />
  </div>
</div>

@style
  @media screen and (min-width: 768px) {
    .freedom-papers-two-col__style-border-bottom {
      bottom: 30%;
    }
  }
@endstyle
