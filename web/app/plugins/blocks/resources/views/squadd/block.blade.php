<div class="container mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full md:w-1/2">
      @if(isset($attr->media) && is_object($attr->media))
        @include('components.image', [
          'image' => $attr->media,
          'classes' => 'w-full pb-6 pr-0 md:pr-8 md:pb-0 md:max-w-4/5',
        ])
      @endif
    </div>

    <div class="flex-col w-full md:w-1/2">
      @if(isset($attr->squaddName) && $attr->squaddName)
        <h1 class="inline-block font-sans text-3xl font-bold uppercase break-all">
          {!! $attr->squaddName !!} @if(isset($attr->city) && $attr->city)// {!! $attr->city !!} @endif
        </h1>
      @endif

      @if(isset($attr->email) && $attr->email)
        <h1 class="block font-sans text-3xl font-bold uppercase break-all">
          {!! $attr->email !!}
        </h1>
      @endif

      @if(isset($attr->twitter) && is_object($attr->twitter) && $attr->twitter->url)
        <h1 class="block font-sans text-3xl font-bold uppercase break-all">
          <a href="{!! $attr->twitter->url !!}">
            @if($attr->twitter->handle) {!! "@{$attr->twitter->handle}" !!} @else Twitter @endif
          </a>
        </h1>
      @endif

      @if(isset($attr->instagram) && is_object($attr->instagram) && $attr->instagram->url)
        <h1 class="block font-sans text-3xl font-bold uppercase break-all">
          <a href="{!! $attr->instagram->url !!}">
            @if($attr->instagram->handle) {!! "@{$attr->instagram->handle}" !!} @else Instagram @endif
          </a>
        </h1>
      @endif

      @if(isset($attr->facebook) && is_object($attr->facebook) && $attr->facebook->url)
        <h1 class="block font-sans text-3xl font-bold uppercase break-all">
          <a href="{!! $attr->facebook->url !!}">
            @if($attr->facebook->handle) {!! "@{$attr->facebook->handle}" !!} @else Facebook @endif
          </a>
        </h1>
      @endif
    </div>
  </div>
</div>
