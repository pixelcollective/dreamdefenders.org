<?php

// AJAX  blog infinite paginate
add_action( 'wp_ajax_infinite_scroll', 'wp_infinitepaginate' );
add_action( 'wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate' );

function max_pages($posts_per_page) {
  $the_query = new WP_Query( array( 'posts_per_page' => $posts_per_page,
                                    'post_type' => 'post') );
  $max_pages = $the_query->max_num_pages;

  return $max_pages;

}

function wp_infinitepaginate() {
  $loopFile        = $_POST['loop_file'];
  $paged           = $_POST['page_no'];
  $posts_per_page  = $_POST['posts_per_page'];

  $args = array('paged' => $paged,
                'post_type' => 'post',
                'cat' => -23,
                'posts_per_page' => $posts_per_page);

  $max_pages = max_pages($posts_per_page);

  if ( $paged > $max_pages ) {
    echo "max";
  } else {
    query_posts($args);
    get_template_part( $loopFile );
  }
    
  wp_reset_query();

  exit;
}

