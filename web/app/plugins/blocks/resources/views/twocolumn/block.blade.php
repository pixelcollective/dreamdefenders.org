<div class="wp-block-tinypixel-twocolumn">
  <div class="wp-block-tinypixel-twocolumn__column-a">
    @isset($attr->heading)
      <h2 class="wp-block-tinypixel-twocolumn__column-a__heading">
        {!! $attr->heading !!}
      </h2>
    @endisset

    @isset($attr->media)
      <div class="wp-block-tinypixel-twocolumn__column-a__media">
        <img src="{!! $attr->media->sizes['large']['url'] !!}" />
      </div>
    @endisset
  </div>

  <div class="wp-block-tinypixel-twocolumn__column-b">
    @isset($content)
      {!! $content !!}
    @endisset
  </div>
</div>
