@group('form')
  <section class="hero hero__bg-center hero__overlay brave darken has-background-dim-80"
           @hassub('form__bg_image') style="background-image: url(@sub('form__bg_image', 'url'));" @endsub>
           <div style="background-color: rgba(0, 0, 0, 0.8); width: 100%; height: 100%; margin: 0; padding: 0; position: absolute;"></div>

    <div class="hero__content inner__content-contained">

      @hassub('form__heading')
      <div class="hero__heading">
          <h2 class="hero__heading hero__heading-paired">@sub('form__heading')</h2>
      </div>
      @endsub

      @hassub('form__subheading')
        <div class="hero__subheading">
          <h4 class="hero__subheading subheading">@sub('form__subheading')</h4>
        </div>
      @endsub

      @hassub("form__selection")
      <div class="hero__form primary">
          {!! do_shortcode('[advanced_form form="'. get_sub_field("form__selection") .'"]') !!}
      </div>
      @endsub

    </div>
  </section>
@endgroup

