<time class="updated" datetime="{{ get_post_time('c', true) }}">
  @published
</time>

<p class="byline author vcard">{{ __('By', 'sage') }}
  <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    @author
  </a>
</p>
