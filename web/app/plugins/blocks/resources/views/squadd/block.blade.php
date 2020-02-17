<div class="container mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full md:w-1/2">
      @isset($attr->media)
        <div class="w-full pb-6 pr-0 lg:pr-8 md:pb-0 md:max-w-4/5">
          <picture>
            <source
              media="(min-width: {{ absint(wp_get_attachment_image_src($attr->media->id, 'full')) }}px)"
              srcset="{{ wp_get_attachment_image_srcset($attr->media->id, 'full') }}"
              sizes="{{ wp_get_attachment_image_sizes($attr->media->id, 'full') }}" />
            <img
              srcset="{{ esc_attr(wp_get_attachment_image_srcset($attr->media->id, 'full')) }}"
              alt="{{ esc_attr(get_post_meta($attr->media->id, '_wp_attachment_image_alt', true)) }}"
              sizes="{{ esc_attr(wp_get_attachment_image_sizes($attr->media->id, 'full')) }}" />
          </picture>
        </div>
      @endisset
    </div>

    <div class="flex-col w-full md:w-1/2">
      @isset($attr->squaddName)
        @if($attr->squaddName)
          <h1 class="inline-block font-sans text-3xl font-bold uppercase break-all">
            {!! $attr->squaddName !!}

            @isset($attr->city)
              @if($attr->city)
                // {!! $attr->city !!}
              @endif
            @endisset
          </h1>
        @endif
      @endisset

      @isset($attr->email)
        @if($attr->email)
          <h1 class="block font-sans text-3xl font-bold uppercase break-all">
            {!! $attr->email !!}
          </h1>
        @endif
      @endisset

      @isset($attr->twitter)
        @if($attr->twitter)
          <h1 class="block font-sans text-3xl font-bold uppercase break-all">
            <a href="{!! $attr->twitter->url !!}">
              {!! "@{$attr->twitter->handle}" !!}
            </a>
          </h1>
        @endif
      @endisset

      @isset($attr->instagram)
        @if($attr->instagram->handle)
          <h1 class="block font-sans text-3xl font-bold uppercase break-all">
            <a href="{!! $attr->instagram->url !!}">
              {!! "@{$attr->instagram->handle}" !!}
            </a>
          </h1>
        @endif
      @endisset

      @isset($attr->facebook)
        @if($attr->facebook->handle)
         <h1 class="block font-sans text-3xl font-bold uppercase break-all">
            <a href="{!! $attr->facebook->url !!}">
              {!! "@{$attr->facebook->handle}" !!}
            </a>
          </h1>
        @endif
      @endisset
    </div>
  </div>
</div>
