<section class="donate-cta-containter"
    @if(isset($data->bg_image))
        style="background-image: url({!! $data->bg_image !!});">
    @endif
    @if(isset($data->bg_color))
        style="background-color: {!! $data->bg_color; !!};"
    @endif
>
  <div class="donate-cta-overlay"></div>

    <div class="donate-cta-content @if(isset($data->alignment)) {!! $data->alignment !!} @endif">

        @if(isset($data->subheading))<h3 class="subheading">{!! $data->subheading !!}</h3> @endif

        @if(isset($data->heading))<h1 class="headline">{!! $data->heading !!}</h1>@endif

        @if($data->button_url && $data->button_text)
            <a class="donate-cta-button" href="{!! $data->button_url !!}">
                {!! $data->button_text !!}
            </a>
        @endif

    </div>
</section>