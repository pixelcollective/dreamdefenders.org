<div class="container mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col py-8 md:flex-row">
    <div class="flex-col w-full md:w-1/2">
      @if(isset($attr->media) && is_object($attr->media))
        @include('components.image', [
          'image' => $attr->media,
          'classes' => 'w-full pb-6 pr-0 md:pr-8 md:pb-0 md:max-w-4/5',
        ])
      @endif
    </div>

    <div class="flex flex-wrap content-center w-full md:w-1/2">
      <div class="flex flex-col md:pl-8">
        @if(isset($attr->squaddName) && is_string($attr->squaddName))
          <h2 class="inline-block font-sans text-3xl font-bold uppercase">
            {!! $attr->squaddName !!} @if(isset($attr->city) && $attr->city)// {!! $attr->city !!} @endif
          </h2>
        @endif

        <ul class="px-0 mx-0">
          @if(isset($attr->email) && is_string($attr->email))
            <li class="block mb-4 font-sans text-lg font-normal break-all">
              <a href="mailto:{!! $attr->email !!}" class="transition-all transition text-black-600 hover:text-black-900">
                @include('components.svg.envelope', ['classes' => 'inline', 'attr' => ['width' => '24px', 'height' => '24px']])
                {!! $attr->email !!}
              </a>
            </li>
          @endif

          @if(isset($attr->facebook) && is_object($attr->facebook) && is_string($attr->facebook->url))
            <li class="block mb-4 font-sans text-lg font-normal break-all">
              <a href="{!! $attr->facebook->url !!}" class="transition-all transition text-black-600 hover:text-black-900">
                @include('components.svg.facebook', ['classes' => 'inline', 'attr' => ['width' => '24px', 'height' => '24px']])
                {!! $attr->facebook->handle ? "@{$attr->facebook->handle}" : "facebook" !!}
              </a>
            </li>
          @endif

          @if(isset($attr->twitter) && is_object($attr->twitter) && is_string($attr->twitter->url))
            <li class="block mb-4 font-sans text-lg font-normal break-all">
              <a href="{!! $attr->twitter->url !!}" class="transition-all transition text-black-600 hover:text-black-900">
                @include('components.svg.twitter', ['classes' => 'inline', 'attr' => ['width' => '24px', 'height' => '24px']])
                {!! $attr->twitter->handle ? "@{$attr->twitter->handle}" : "twitter" !!}
              </a>
            </li>
          @endif

          @if(isset($attr->instagram) && is_object($attr->instagram) && is_string($attr->instagram->url))
            <li class="block mb-4 font-sans text-lg font-normal break-all">
              <a href="{!! $attr->instagram->url !!}" class="transition-all transition text-black-600 hover:text-black-900">
                @include('components.svg.instagram', ['classes' => 'inline', 'attr' => ['width' => '24px', 'height' => '24px']])
                {!! $attr->instagram->handle ? "@{$attr->instagram->handle}" : "instagram" !!}
              </a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>
