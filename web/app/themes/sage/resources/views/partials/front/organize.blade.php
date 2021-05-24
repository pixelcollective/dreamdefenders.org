<div class="relative bg-black">
  <div class="block pb-16 bg-center bg-no-repeat md:bg-fixed md:bg-cover" style="background-image: url(@asset('images/background-dark-noisey.png');">
    <div class="flex flex-wrap content-center w-screen mx-auto md:container">
      <h2 data-faded class="w-full pt-12 pb-4 text-4xl italic font-bold text-center text-white">
        We have nothing to lose but our chains.
      </h2>
    </div>

    <div class="relative z-10 w-full mx-auto max-h-128 h-128">
      <div class="w-screen h-full max-w-full mx-auto lg:container bg-gradient-to-b from-yellow-400 via-white to-blue-400">
        <div class="w-full h-full bg-white bg-fixed bg-gradient-to-b from-yellow-400 via-white to-blue-400">
          <div class="relative w-full h-full bg-fixed bg-gradient-to-b from-yellow-400 via-white to-blue-400">
            <div data-faded class="absolute top-0 bottom-0 left-0 right-0 block h-full overflow-hidden">
              @svg('organize', 'bg-organize pointer-events-none object-top w-full h-full object-cover')
            </div>

            <div class="relative z-0 items-center justify-center w-screen py-8 mx-auto text-white bg-black lg:w-3/5 organize-form">
              <h3 data-faded class="text-center text-white">
               Donate to our work.
              </h3>

              <div class="flex flex-col w-4/5 mx-auto text-black space-between">
                <p class="text-lg leading-relaxed text-center text-white">
                  <span data-faded>We are an uprising of rebellious youth fighting for our freedom.<br /></span>
                  <span data-faded>We are organizers shaping our collective destinies.<br /></span>
                  <span data-faded>We are the next generation of revolutionaries.<br /></span>
                </p>

                <p class="text-lg leading-relaxed text-center text-white">
                  <span data-faded>Join our we.<br /></span>
                  <span data-faded>Join the squadd.<br /></span>
                </p>

                <a href="https://secure.actblue.com/donate/givetodd" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-bg-color="rgba(253,225,53,1)" fx-off-bg-color="rgba(255,255,255,1)" type="submit" class="py-4 my-2 text-2xl font-bold tracking-wider text-center uppercase bg-white text-black-900 font-display">
                  Donate
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
