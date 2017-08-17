<?php

function as_custom_scripts() {
    $theme_url = get_template_directory_uri();

    wp_register_script( 'as-custom-js',  $theme_url . '/lib/js/as-custom-script.js', array( 'jquery' ), 1.0, true );
    wp_register_script( 'as-bootstrap-js',  $theme_url . '/lib/js/bootstrap.min.js', array( 'jquery' ), 1.0 );
    wp_register_script( 'as-cycle-js',  $theme_url . '/lib/js/jquery.cycle.all.js', array( 'jquery' ), 1.0,true );

    wp_enqueue_script('jquery', true );
    wp_enqueue_script('as-custom-js');
    wp_enqueue_script('as-bootstrap-js');
    wp_enqueue_script('as-cycle-js');
}

add_action( 'wp_enqueue_scripts', 'as_custom_scripts' );

