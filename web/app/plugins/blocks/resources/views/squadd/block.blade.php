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

    <div class="flex flex-wrap content-center w-full md:w-1/2">
      <div class="flex flex-col">
        @if(isset($attr->squaddName) && $attr->squaddName)
          <h2 class="inline-block font-sans text-3xl font-bold uppercase">
            {!! $attr->squaddName !!} @if(isset($attr->city) && $attr->city)// {!! $attr->city !!} @endif
          </h2>
        @endif

        <ul class="px-0 mx-0">
          @if(isset($attr->email) && $attr->email)
            <li class="block font-sans text-lg font-normal break-all mb-4">
              <a href="mailto:{!! $attr->email !!}" class="text-black-600 hover:text-black-900 transition transition-all">
                @include('components.svg.envelope', ['classes' => 'inline', 'attr' => ['width' => '24px', 'height' => '24px']])
                {!! $attr->email !!}
              </a>
            </li>
          @endif

          @if(isset($attr->facebook) && is_object($attr->facebook) && $attr->facebook->url)
            <li class="block font-sans text-lg font-normal break-all mb-4">
              <a href="{!! $attr->facebook->url !!}" class="text-black-600 hover:text-black-900 transition transition-all">
                @include('components.svg.facebook', ['classes' => 'inline', 'attr' => ['width' => '24px', 'height' => '24px']])
                {!! $attr->facebook->handle ? "@{$attr->facebook->handle}" : "facebook" !!}
              </a>
            </li>
          @endif

          @if(isset($attr->twitter) && is_object($attr->twitter) && $attr->twitter->url)
            <li class="block font-sans text-lg font-normal break-all mb-4">
              <a href="{!! $attr->twitter->url !!}" class="text-black-600 hover:text-black-900 transition transition-all">
                @include('components.svg.twitter', ['classes' => 'inline', 'attr' => ['width' => '24px', 'height' => '24px']])
                {!! $attr->twitter->handle ? "@{$attr->twitter->handle}" : "twitter" !!}
              </a>
            </li>
          @endif

          @if(isset($attr->instagram) && is_object($attr->instagram) && $attr->instagram->url)
            <li class="block font-sans text-lg font-normal break-all mb-4">
              <a href="{!! $attr->instagram->url !!}" class="text-black-600 hover:text-black-900 transition transition-all">
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
