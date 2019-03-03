<header class="site-header wrap" role="banner">
  <div class="top-panel">
    <a style="" class="logo" href="{{ home_url('/') }}">
      <img src="@asset('images/dream-defenders-logo.png')" />
    </a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <button class="hamburger hamburger--spin" type="button" aria-label="Menu" aria-controls="navigation">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
  </div>
</header>
