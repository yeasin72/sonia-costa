<?php
/**
 * Plugin Name: Sonia Costa Widget
 * Description: Blog widgets for Elementor.
 * Version:     1.0.0
 * Author:      Yeasin Arafath
 * Author URI:  https://www.fiverr.com/yeasin71
 * Text Domain: elementor-addon
 */

function register_sonia_blog_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/post-widget.php' );
	require_once( __DIR__ . '/widgets/post-tag.php' );
	require_once( __DIR__ . '/widgets/doctor-list.php' );
	require_once( __DIR__ . '/widgets/casos-list.php' );

	$widgets_manager->register( new \Sonia_Blog() );
	$widgets_manager->register( new \Sonia_Blog_tag() );
	$widgets_manager->register( new \Doctor_List() );
	$widgets_manager->register( new \Casos_List() );
	

}
add_action( 'elementor/widgets/register', 'register_sonia_blog_widget' );