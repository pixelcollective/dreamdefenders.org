@if($card->image && $card->url)
  <div class="w-full p-2 md:w-1/3">
    <a href="{!! $card->url !!}"
      hoverfx hoverfx fx-elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
      class="block object-contain shadow shadow-md w-100 hover:shadow-2xl transition transition-all hover:relative">
      <img
        class="w-100"
        src="{!! $card->image !!}"
        @isset($card->title) title="{!! $card->title !!}" @endisset
        @isset($card->description) alt="{!! $card->description !!}" @endisset
      />
    </a>
  </div>
@endif
