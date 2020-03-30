<div class="hidden md:block bg-black">
  <div class="flex flex-col justify-around lg:flex-row bg-black pointer-events-none">
    <div class="w-1/4">
      <img class="object-fit object-contain" src="@asset('images/waves-left.png')" />
    </div>

    <div class="w-1/2 mx-auto relative flex flex-col flex-wrap justify-center align-middle">
      <h2 class="mb-0 text-4xl font-bold text-center mx-auto block text-white relative leading-none inline-block m-0 p-0">
        There are two paths
      </h2>
      <div class="absolute w-full h-4 mx-16 flex flex-col flex-wrap align-middle justify-center" style="top: 40%;">
        <div class="exOut bg-yellow h-2"></div>
      </div>
    </div>

    <div class="w-1/4">
      <img src="@asset('images/waves-right.png')" class="object-fit object-contain" />
    </div>
  </div>

  <div class="flex flex-row relative h-96 max-h-96 overflow-hidden">
    <div class="divider-or absolute inline-block bg-black text-white z-30 uppercase font-bold px-2 py-1" style="top: 40%; left: 47.6%;">
      Or
    </div>

    <div class="two-paths-left hidden md:inline-block w-auto w-1/2 max-w-1/2 text-white bg-black">
      <h2 class="text-white block font-display text-3xl uppercase p-16">
        Rising gun violence, tuition, unemployment, the number of our people dead, deported or in jail, rent, stress, debt, overdoses, suicide, hate.
      </h2>
    </div>

    <div class="two-paths-right md:inline-block w-auto w-1/2 text-white bg-white relative align-middle h-96 max-h-96 oveflow-hidden">
      <div class="we-rise-bg-container relative w-screen bg-white h-full">
        <img src="@asset('images/we-rise-bg.jpg')" class="absolute h-92 w-screen object-cover top-0 bottom-0" style="opacity: 0" />
      </div>

      <h2 class="text-black inline font-display text-3xl uppercase italic p-16 absolute top-0 left-0 right-0 bottom-0 z-10 leading-none">
        We <span class="rise-highlight">Rise.</span>
      </h2>
    </div>
  </div>
</div>
