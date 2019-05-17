<header class="bg-black text-white py-4">
  <div class="container">
    <a class="text-white no-underline text-uppercase" href="{{ home_url('/') }}">
      {{ get_bloginfo('name', 'display') }}
    </a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
