<footer class="w-full pb-3 bg-gray">
  <div class="container flex flex-row mx-auto uppercase justify-evenly text-white-800">
    <nav class="flex-row justify-around hidden pt-0 pb-8 md:py-8 text-white max-h-16 md:flex">
      <a hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="/squadds">Squadds</a>
      <a hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="/projects">Projects</a>
    </nav>

    <div class="relative flex flex-col w-64 mx-auto">
      <div class="flex items-center w-full">
        <div class="flex items-center justify-center w-full h-full mx-auto text-black">
          <div class="text-black">
            @svg('logo-solid', 'fill-current text-black stroke-white py-0 px-4 relative', ['style' => 'top: -5rem;'])
          </div>
        </div>
      </div>

      <div class="flex flex-row items-center w-full pt-0 pb-8 md:py-8justify-evenly">
        <a href="{!! $app->accounts->facebook !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
          @brands('facebook', 'fill-current')
        </a>

        <a href="{!! $app->accounts->twitter !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
          @brands('twitter', 'fill-current')
        </a>

        <a href="{!! $app->accounts->instagram !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
          @brands('instagram', 'fill-current', ['style' => 'padding-left: 0.1rem;'])
        </a>

        <a href="{!! $app->accounts->email !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
          @solid('envelope', 'fill-current')
        </a>
      </div>
    </div>

    <nav class="flex-row justify-around hidden pt-0 pb-8 md:py-8 text-white max-h-16 md:flex">
      <a hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="/freedom-papers">Freedom Papers</a>
      <a hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="/blog">Publications</a>
    </nav>
  </div>
</footer>
