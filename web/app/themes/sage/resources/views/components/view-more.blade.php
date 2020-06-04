@isset($posts)
  <div class="flex flex-col flex-wrap px-4 mx-auto mt-0 alignfull md:flex-row" style="max-width: 1600px; margin-top: 0;">
    @foreach($posts as $post)
      <div class="w-full p-2 md:w-1/3">
        <a
          href="{!! $post->href !!}"
          hoverfx
          fx-elasticity="0"
          fx-duration="800"
          fx-on-scale="1.1"
          fx-off-scale="1"
          fx-on-translate-y="-3px"
          fx-off-translate-y="0px"
          class="relative z-0 block object-contain shadow shadow-md w-100 hover:shadow-2xl transition transition-all hover:z-10"
        >
          <img
            class="w-100"
            src="{!! $post->img !!}"
            @if($post->title) title="{!! $post->title !!}" @endif
            @if($post->excerpt) alt="{!! $post->excerpt !!}" @endif
          />
        </a>
      </div>
    @endforeach
  </div>
@endisset