<?php
/**
* Plugin Name: Charts And Graphs Manager
* Description: This plugin allows create chart.
* Version: 1.0
* Copyright: 2022
* Text Domain: charts-and-graphs-manager
* Domain Path: /languages 
*/


if (!defined('ABSPATH')) {
  die('-1');
}

if (!defined('CAGM_PLUGIN_DIR')) {
  define('CAGM_PLUGIN_DIR',plugins_url('', __FILE__));
}

include_once('admin/cagm_chart.php');
include_once('includes/frontend/cagm_frontend.php');


add_action( 'admin_enqueue_scripts','CAGM_load_admin');
function CAGM_load_admin() {
  
    wp_enqueue_style( 'wp-color-picker' );
    wp_register_script( 'wp-color-picker-alpha', CAGM_PLUGIN_DIR . '/admin/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
    wp_enqueue_style( 'cagm-backend-css', CAGM_PLUGIN_DIR.'/admin/css/cagm_back.css', false, '1.0' );
     
    wp_enqueue_script( 'wp-color-picker-alpha' );
    wp_enqueue_script( 'CAGM-jquery-js', CAGM_PLUGIN_DIR . '/admin/js/cagm_back_chart.js', false, '2.0.0' );
    $chart_cgtypes = get_post_meta(get_the_id(), 'chart_types', true);
    //echo $chart_cgtypes;
    wp_localize_script( 'CAGM-jquery-js', 'jquerypostjs', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'chart_typesss' => $chart_cgtypes

    ));  
}

add_action('wp_enqueue_scripts','CAGM_load_script_style');
function CAGM_load_script_style() {
    wp_enqueue_script('chart-min-js', CAGM_PLUGIN_DIR . '/admin/js/chart.min.js', false, '1.0');
}