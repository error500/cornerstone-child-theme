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

		//Load your own js file if needed
		/*wp_enqueue_script(
			'child_js',
			get_stylesheet_directory_uri(). '/js/child.js',
			array( 'jquery' ),
			'1.0',
			true
		);	*/
		
		wp_enqueue_script(
			'owl.carousel_js',
			get_template_directory_uri() . '/libs/owl.carousel/dist/owl.carousel.min.js',
			array('jquery'),
			'2.0',
			true
		);
	}
}


add_action( 'wp_enqueue_scripts', 'load_cornerstone_child_css', 50 );
add_action('wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);

require_once ( get_stylesheet_directory() . '/theme-options.php' );

?>