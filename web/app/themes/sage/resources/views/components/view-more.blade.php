@isset($posts)
  <div class="container pb-32 mx-auto">
    <h2 class="mt-16 text-4xl font-hairline font-bold leading-relaxed text-center font-display">
      {!! $slot ?? 'Explore our other projects' !!}
    </h2>

    <div class="flex flex-col flex-wrap px-4 mx-auto mt-0 alignfull md:flex-row" style="max-width: 1600px; margin-top: 0;">
      @foreach($posts as $post)
        <div class="w-full p-2 md:w-1/4">
          <div class="bg-gray-100 h-96 @if($post->image) bg-cover bg-image-{!! $post->id !!} @endif">
            <div class="flex flex-col content-center w-full h-full p-1 bg-black-500 hover:bg-black-200 transition transition-all">
              <a class="w-full h-full" href="{!! $post->href !!}">
                <h3 class="w-full h-full px-2 text-4xl text-white break-all font-display text-bold">
                  {!! $post->title !!}
                </h3>
              </a>
            </div>
          </div>
        </div>

        @if($post->image)
          @style
            .bg-image-{!! $post->id !!} {
              background-image: url({!! $post->image !!});
            }
          @endstyle
        @endif
      @endforeach
    </div>
  </div>
@endisset