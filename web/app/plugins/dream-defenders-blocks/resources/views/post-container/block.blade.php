<div class="container mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full p-2 mb-16 md:w-1/2">
        @if(isset($attr->title) && is_string($attr->title))
            <h1 class="inline-block pr-8 text-5xl font-extrabold font-display leading-none uppercase md:pr-6 lg:pr-8 md:pb-8 md:max-w-4/5">
                {!! $attr->title !!}
            </h1>
        @endif

        <span class="inline-block w-full mb-4 font-sans uppercase text-md">
            {!! get_the_date() !!}
        </span>

        @if(isset($attr->media) && is_object($attr->media))
            <div class="w-full pb-6 pr-8 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5">
                @include('components.image', ['image' => $attr->media])
            </div>
        @endif
    </div>

    <div class="flex-col w-full md:w-1/2">
        @if(isset($content) && is_string($content))
            {!! $content !!}
        @endif
    </div>
  </div>
</div>
