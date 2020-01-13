<div class="bg-white">
  <div class="block py-16 bg-center bg-no-repeat bg-cover md:bg-fixed cover" style="background-image: url(@asset('images/background-dark-noisey.png');">
    <div class="container mx-auto">
      <h2 class="text-4xl italic font-bold text-center text-white">We have nothing to lose but our chains:</h2>
    </div>
    <div class="relative z-0 w-full mx-auto">
      <div class="container mx-auto">
        <div class="bg-white">
          <div class="relative w-full h-128 bg-gradient-b-yellow-white-blue">
            <div class="absolute top-0 bottom-0 left-0 right-0 overflow-hidden">
              @svg('organize', 'bg-organize pointer-events-none z-0')
            </div>

            <div class="relative z-0 items-center justify-center w-4/5 py-8 mx-auto text-white bg-black organize-form">
              <h3 class="italic text-center text-white">
                Join our mailing list
              </h3>

              <form class="flex flex-col w-4/5 mx-auto text-black space-between" action="#">
                <input type="text" class="py-4 my-2 text-center text-black placeholder-gray-500" placeholder="Enter your email here.." />
                <button type="submit" class="py-4 my-2 tracking-wide uppercase bg-white text-black-900 font-display">
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

@style
  .organize-form {
    top: 340px;
  }
@endstyle