<div class="bg-gradient-b-white-yellow flex flex-row flex-wrap justify-center pt-8 md:pt-16 pb-32 relative">
    <div class="flex flex-wrap w-4/5 mx-auto px-4 flex-col md:flex-row overflow-hidden content-center justify-around">
      <div class="w-full md:w-1/2 overflow-hidden text-center md:text-left pb-8 md:pb-16">
        <img src="@asset('images/freedom-papers-art.png')" />
      </div>

      <div class="w-full md:w-1/2 overflow-hidden flex flex-col md:align-end px-2 text-left md:text-right align-middle self-center content-center">
        <a href="/freedom-papers" class="font-display uppercase font-bold text-2xl block md:inline w-full md:w-auto relative">
          @svg('arrow-right', 'inline h-12 w-12 relative top-0 left-0 right-0 hidden md:inline-block', ['width' => 32, 'height' => 32])
          <span class="border-b-4 absolute bottom-0 border-blue w-full freedom-papers-two-col__style-border-bottom"></span>
          <span class="w-full md:w-auto">Freedom Papers</span>
        </a>

        <p>What’s the future we are fighting for? The Freedom Papers illustrates our vision for a world that serves the everyday needs of its people - the one we all deserve. The Freedom Papers is our new north star.</p>
      </div>
    </div>
  <div class="w-1/5 justify-center flex flex-wrap flex-col content-center">
    <img src="@asset('images/world-we-are-fighting-for.png')" class="md:w-1/5 sm:w-2/5 w-3/5 freedom-papers-two-col__world-we-are-fighting-for mx-auto top-0 select-none" />
  </div>
</div>

@style
  @media screen and (min-width: 768px) {
    .freedom-papers-two-col__style-border-bottom {
      bottom: 30%;
    }
  }
@endstyle