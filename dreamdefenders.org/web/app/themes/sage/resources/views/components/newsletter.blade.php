<section class="cta" @if(isset($data->bg_color)) style="background-color: {!! $data->bg_color !!}" @endif >
    <div class="cta__content inner__content-contained">
        <div class="cta__heading"><h2 @if(isset($data->heading_text_color)) style="color: {!! $data->heading_text_color !!}" @endif >@if(isset($data->heading)) {!! $data->heading !!} @endif</h2></div>
        <div class="cta__image" @if(isset($data->image)) style="background-image: url({!! $data->image !!})" @endif></div>
        <div class="cta__subheading">
            @if(isset($data->subheading))
                <h4 @if(isset($data->subheading_text_color)) style="color: {!! $data->subheading_text_color !!}" @endif>@if(isset($data->subheading)) {!! $data->subheading !!} @endif</h4>
            @endif
        </div>
        <div class="cta__form">@php echo do_shortcode("[salesforce form='1']") @endphp</div>
    </div>
</section>