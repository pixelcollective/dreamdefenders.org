<div class="container mx-auto md:w-3/5 wp-blocks-tinypixel-post-container">
    <div class="flex flex-col md:flex-row">
        <div class="flex-col w-full">
            @if(isset($attr->media->url) && is_string($attr->media->url))
                <div class="w-full min-w-full pb-4">
                    @include('components.image', [
                        'image' => $attr->media,
                        'classes' => 'w-full min-w-full mx-auto text-center',
                    ])
                </div>

                @if(isset(property_exists($attr->mediaDownload->url) && is_string($attr->mediaDownload->url))
                    <div class="block w-4/5 w-full pb-8 mx-auto font-bold text-center uppercase md:w-1/2">
                        <a href="{!! $attr->mediaDownload->url !!}" class="mx-auto text-center">
                            @include('components.svg.download-this-volume')
                        </a>
                    </div>
                @endif
            @endif

            @if(isset($content) && is_string($content))
                {!! $content !!}
            @endif
        </div>
    </div>
</div>
