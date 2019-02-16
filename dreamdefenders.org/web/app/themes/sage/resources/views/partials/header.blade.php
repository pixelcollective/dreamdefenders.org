<header class="site-header wrap" role="banner">
    <div class="top-panel">

  <a style="" class="logo" href="{{ home_url('/') }}">
    <img style="display: inline;" src="@asset('images/dream-defenders-logo.png')" />
  </a>
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
  </nav>
</div>

</header>
