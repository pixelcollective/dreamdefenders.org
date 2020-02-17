@isset($image)
  <div class="{!! isset($classes) ? $classes : 'w-full pb-6 pr-0 lg:pr-8 md:pb-0 md:max-w-4/5' !!}">
    <picture>
      <source
        media="(min-width: {{ absint(wp_get_attachment_image_src($image)) }}px)"
        srcset="{{ wp_get_attachment_image_srcset($image) }}"
        sizes="{{ wp_get_attachment_image_sizes($image) }}" />
      <img
        srcset="{{ esc_attr(wp_get_attachment_image_srcset($image)) }}"
        alt="{{ esc_attr(get_post_meta($image, '_wp_attachment_image_alt', true)) }}"
        sizes="{{ esc_attr(wp_get_attachment_image_sizes($image)) }}" />
    </picture>
  </div>
@endisset

@isset($debug)
  @if($debug)
    @dump($image)
  @endif
@endisset
