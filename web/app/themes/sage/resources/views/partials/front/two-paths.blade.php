<div class="hidden bg-black md:block">
  <div class="flex flex-col justify-around bg-black pointer-events-none md:flex-row">
    <div class="w-1/4">
      <img class="object-contain object-fit" src="@asset('images/waves-left.png')" />
    </div>

    <div class="relative flex flex-col flex-wrap justify-center w-1/2 mx-auto align-middle">
      <h2 class="relative block inline-block p-0 m-0 mx-auto mb-0 text-4xl font-bold leading-none text-center text-white">
        There are two paths
      </h2>
      <div class="absolute w-10/12 h-2 ml-1/12 mr-1/12">
        <div class="absolute justify-center h-2 mx-auto align-middle exOut bg-yellow" style="top: 40%;"></div>
      </div>
    </div>

    <div class="w-1/4">
      <img src="@asset('images/waves-right.png')" class="object-contain object-fit" />
    </div>
  </div>

  <div class="relative flex flex-row w-full overflow-hidden h-96 max-h-96">
    <div class="hidden w-auto w-1/2 text-white bg-black two-paths-left md:inline-block max-w-1/2">
      <h2 class="block p-16 text-3xl text-white uppercase font-display">
        Rising gun violence, tuition, unemployment, the number of our people dead, deported or in jail, rent, stress, debt, overdoses, suicide, hate.
      </h2>
    </div>

    <div class="relative z-30 w-2 divider-or" style="top:40%; left: -12px;">
      <span class="relative inline w-2 px-2 py-1 font-bold text-white uppercase bg-black">Or</span>
    </div>

    <div class="relative w-auto w-1/2 text-white align-middle bg-white two-paths-right md:inline-block h-96 max-h-96 oveflow-hidden">
      <div class="relative w-screen h-full bg-white we-rise-bg-container">
        <img src="@asset('images/we-rise-bg.jpg')" class="absolute top-0 bottom-0 object-cover w-screen h-92" style="opacity: 0" />
      </div>

      <h2 class="absolute top-0 bottom-0 left-0 right-0 z-10 inline p-16 text-3xl italic leading-none text-black uppercase font-display">
        We <span class="rise-highlight">Rise.</span>
      </h2>
    </div>
  </div>
</div>
