<div class="bg-black relative">
  <div class="block md:bg-fixed bg-center bg-no-repeat md:bg-cover pb-16" style="background-image: url(@asset('images/background-dark-noisey.png');">
    <div class="w-screen md:container mx-auto flex flex-wrap content-center">
      <h2 data-faded class="w-full text-4xl italic font-bold text-center text-white pt-12 pb-4">
        We have nothing to lose but our chains.
      </h2>
    </div>

    <div class="relative z-10 w-full mx-auto max-h-128 h-128">
      <div class="w-screen lg:container mx-auto h-full max-w-full">
        <div class="bg-white w-full h-full">
          <div class="relative w-full h-full bg-fixed bg-gradient-b-yellow-white-blue">
            <div data-faded class="absolute top-0 bottom-0 left-0 right-0 overflow-hidden block h-full">
              @svg('organize', 'bg-organize pointer-events-none object-top w-full h-full object-cover')
            </div>

            <div class="z-0 relative mx-auto items-center justify-center py-8 mx-auto text-white bg-black w-screen mx-auto lg:w-3/5 organize-form">
              <h3 data-faded class="text-center text-white">
                Join the Squadd
              </h3>

              <div class="flex flex-col w-4/5 mx-auto text-black space-between">
                <p class="text-white text-center leading-relaxed text-lg">
                  <span data-faded>We are an uprising of rebellious youth fighting for our freedom.<br /></span>
                  <span data-faded>We are organizers shaping our collective destinies.<br /></span>
                  <span data-faded>We are the next generation of revolutionaries.<br /></span>
                </p>
                <p class="text-white text-center leading-relaxed text-lg">
                  <span data-faded>Join our we.<br /></span>
                  <span data-faded>Join the squadd.<br /></span>
                </p>
                <a href="https://secure.actblue.com/donate/joindd" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-bg-color="rgba(253,225,53,1)" fx-off-bg-color="rgba(255,255,255,1)" type="submit" class="py-4 my-2 tracking-wider uppercase bg-white text-black-900 font-display font-bold text-2xl text-center">
                  Join up
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@style
  .organize-form {
    top: 120px;
  }

  @media (min-width: 768px) {
    .organize-form {
      top: 280px;
    }
  }
@endstyle
