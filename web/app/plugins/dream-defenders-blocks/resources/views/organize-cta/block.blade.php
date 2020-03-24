<div class="bg-white">
  <div class="block bg-fixed bg-center bg-no-repeat bg-cover cover pb-16" style="background-image: url(@asset('images/background-dark-noisey.png');">
    <div class="container mx-auto flex flex-wrap content-center">
      <h2 data-faded class="w-full text-4xl italic font-bold text-center text-white pt-12 pb-4">
        We have nothing to lose but our chains.
      </h2>
    </div>

    <div class="relative z-0 w-full mx-auto">
      <div class="container mx-auto max-w-64">
        <div class="bg-white">
          <div class="relative w-full bg-fixed h-128 bg-gradient-b-yellow-white-blue">
            <div data-faded class="absolute top-0 bottom-0 left-0 right-0 hidden overflow-hidden md:block">
              @svg('organize', 'bg-organize pointer-events-none z-0')
            </div>

            <div class="relative z-0 items-center justify-center w-4/5 py-8 mx-auto text-white bg-black md:relative lg:w-3/5 organize-form">
              <h3 data-faded class="italic text-center text-white">
                Join our mailing list
              </h3>

              <form class="flex flex-col w-4/5 mx-auto text-black space-between" action="#">
                <input type="text" class="focus:no-outline focus:border-1 focus:border-blue py-4 my-2 text-center text-black placeholder-gray-500 focus:shadow-inset transition transition-duration-2000 transition-all" placeholder="Enter your email here.." />

                <button hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-bg-color="rgba(253,225,53,1)" fx-off-bg-color="rgba(255,255,255,1)" type="submit" class="py-4 my-2 tracking-wider uppercase bg-white text-black-900 font-display font-bold text-2xl">
                  Sign up
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .organize-form {
    top: 120px;
  }

  @media (min-width: 768px) {
    .organize-form {
      top: 340px;
    }
  }
</style>
