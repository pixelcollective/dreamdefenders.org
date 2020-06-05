<?php

/**
 * Plugin name: Bedrock health checks
 */

add_filter('site_status_tests', function (array $test) {
  unset(
    $test['async']['background_updates'],
    $test['direct']['theme_version'],
    $test['direct']['php_extensions'],
    $test['direct']['plugin_version']
  );

  return $test;
}, 10, 1);

add_filter('debug_information', function (array $debug) {
  unset($debug['wp-database']);
  return $debug;
}, 10, 1);

add_action('wp_dashboard_setup', function () {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']);
});

add_action('admin_head', function () {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
});

/* add_action('admin_print_styles', function () {
  print "
    <style type=\"text/css\">
      #dashboard-widgets .postbox-container {
        display: none;
      }
    </style>";
});
 */

add_action('admin_bar_menu', function ($bar) {
  $node = $bar->get_node('my-account');
  $node->title = str_replace('Howdy, ', '', $node->title);

  $bar->add_node($node);

/*   $bar->remove_node('about');
  $bar->remove_node('wporg');
  $bar->remove_node('comments');
  $bar->remove_node('feedback');
  $bar->remove_node('support-forums');
  $bar->remove_node('wp-logo-external');
  $bar->remove_node('documentation');
  $bar->remove_node('new-content'); */

  return $bar;
}, 999);

/* add_filter('admin_menu', function () {
  remove_menu_page('gutenberg');
  remove_menu_page('wp-graphiql/wp-graphiql.php');
  remove_menu_page('themes.php');
}, 999); */

add_filter('acf/settings/show_admin', function () {
  return false;
});
