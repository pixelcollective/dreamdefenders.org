<div class="container mx-auto wp-blocks-tinypixel-horizontal-card">
    <div class="flex flex-col py-8 md:flex-row">
        <div class="flex flex-wrap content-center w-full md:w-1/2">
            <div class="pb-6 pr-0 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5">
                @if(isset($attr->media) && is_object($attr->media))
                    @include('components.image', ['image' => $attr->media, 'classes' => 'w-full shadow-lg hover:shadow-xl'])
                @endif
            </div>
        </div>

        <div class="flex flex-wrap content-center w-full md:w-1/2">
            @if(isset($content) && is_string($content))
                <div class="w-full">
                    {!! $content !!}
                </div>
            @endif
        </div>
    </div>
</div>
