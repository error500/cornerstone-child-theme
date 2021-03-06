<?php

// Enqueue CSS and scripts

if ( ! function_exists( 'load_cornerstone_child_css' ) ) {
	// the only one css loaded here (use compass to get it)
	function load_cornerstone_child_css() {
		wp_enqueue_style(
			'cornerstone_child_css',
			get_stylesheet_directory_uri() . '/css/app.css'
		);
	}
}

if ( ! function_exists( 'load_cornerstone_child_scripts' ) ) {
	
	function load_cornerstone_child_scripts() {

		/*wp_enqueue_script(
			'foundation_interchange_js',
			get_template_directory_uri() . '/libs/foundation/js/foundation/foundation.interchange.js',
			array('foundation_js'),
			'1.0',
			true
		);*/
		// load if needed

		// Orbit is disable since it is deprecated. Replaced with owl loaded in parent cornerstone theme
		/*wp_enqueue_script(
			'foundation_orbit_js',
			get_template_directory_uri() . '/libs/foundation/js/foundation/foundation.orbit.js',
			array('foundation_js'),
			'1.0',
			true
		);*/
		//Load your own js file if needed
		/*wp_enqueue_script(
			'child_js',
			get_stylesheet_directory_uri(). '/js/child.js',
			array( 'jquery' ),
			'1.0',
			true
		);	*/
	}
}


add_action( 'wp_enqueue_scripts', 'load_cornerstone_child_css', 50 );
add_action('wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);

require_once ( get_stylesheet_directory() . '/theme-options.php' );

?>