<form role="search" method="get" class="search-form" action="{{ home_url('/') }}">
  <label class="text-xl font-display">
    <span class="screen-reader-text">
      {{ _x('Search for:', 'label', 'sage') }}
    </span>

    <input type="search" class="search-field font-light" placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}" value="{{ get_search_query() }}" name="s">
  </label>

  <input type="submit" class="font-light button bg-black text-white py-1 px-2 border font-display uppercase hover:bg-blue hover:border-blue hover:cursor-pointer hover transition transition-all" value="{{ esc_attr_x('Search', 'submit button', 'sage') }}">
</form>
