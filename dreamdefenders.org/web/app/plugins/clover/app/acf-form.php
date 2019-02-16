<?php

namespace TinyPixel\App;

acf_register_form([
    'id'                   => 'activist-form',
    'post_id'              => 'new_post',
    'new_post'             => [
        'post_type'   => 'activist',
        'post_status' => 'draft',
    ],
    'field_groups'         => array(2201),
    'field_el'             => 'div',
    'form'                 => true,
    'html_before_fields'   => '<div class="cta__form primary">',
    'html_after_fields'    => '</div>',
    'submit_value'         => 'Defend With Us',
    'updated_message'      => 'Thank you!',
    'html_updated_message' => '<div id="message" class="updated"><p>%s</p></div>',
    'html_submit_button'   => '<input type="submit" class="button button-ghost" value="%s" />',
    'html_submit_spinner'  => '<span class="acf-spinner"></span>'
]);

/**
 * Process Form Data
 *
 * add_action('acf/pre_save_post')
 */
add_action(
    'acf/pre_save_post',
    function ($post_id) {

        $first_name = $_POST['acf']['field_5c67bb7cf03f8'];
        $last_name = $_POST['acf']['field_5c67bba4f03fa'];
        $email = $_POST['acf']['field_5c67bbb4f03fb'];

        $post = [
            'ID'            => $post_id,
            'post_type'     => 'activist',
            'post_title'    => '🎉 '. $first_name .' '. $last_name .' <'. $email .'> ',
        ];

        // insert the post
        $post_id = wp_insert_post($post);

        return $post_id;
    },
    10,
    1
);
