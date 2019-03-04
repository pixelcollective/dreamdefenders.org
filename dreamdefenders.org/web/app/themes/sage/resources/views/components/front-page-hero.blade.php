<section class="hero hero__bg-center darken
                hero__overlay heroic
                heroic"
                @if($data->bg_img) style="background-image: url({!! $data->bg_img !!});"
                @elseif($data->bg_color) style="background-color: {!! $data->bg_color !!};"
                @endif>

    <div class="hero__content inner__content-contained
             {!! $data->desktop_alignment !!}
             {!! $data->mobile_alignment !!}">

      @if($data->heading)
        <h1 class="hero__heading hero__heading-paired">
          {!! $data->heading !!}
        </h1>
      @endif

      @if($data->subheading)
        <h2 class="hero__subheading subheading">
          {!! $data->subheading !!}
        </h2>
      @endif

    @if($data->link_text && $data->link_url)
      <a class="hero__button" href="{!! $data->link_url !!}">
        {!! $data->link_text !!}
      </a>
    @endif
  </div>
</section>