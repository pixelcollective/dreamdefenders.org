<footer class="w-full pb-3 bg-gray">
  <div class="container flex flex-row mx-auto uppercase justify-evenly text-white-800">
    <nav class="flex-row justify-around flex-1 hidden py-8 text-white max-h-16 md:flex">
      <a hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="#">Squadds</a>
      <a hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="#">Projects</a>
    </nav>

    <div class="flex-1">
      <div class="relative flex flex-col w-64 mx-auto" style="top: -5rem;">
        <div class="flex items-center w-full">
          <div class="flex items-center justify-center w-full h-full mx-auto text-black">
            <div class="text-black pa-8">
              @svg('logo-solid', 'fill-current text-black stroke-white')
            </div>
          </div>
        </div>

        <div class="flex flex-row items-center w-full pt-8 justify-evenly">
          <a href="#" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
            @brands('facebook', 'fill-current')
          </a>

          <a href="#" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
            @brands('twitter', 'fill-current')
          </a>

          <a href="#" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
            @brands('instagram', 'fill-current', ['style' => 'padding-left: 0.1rem;'])
          </a>

          <a href="#" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
            @solid('envelope', 'fill-current')
          </a>
        </div>
      </div>
    </div>

    <nav class="flex-row justify-around flex-1 hidden py-8 text-white max-h-16 md:flex">
      <a hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="#">Freedom Papers</a>
      <a hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="#">Publications</a>
    </nav>
  </div>
</footer>
