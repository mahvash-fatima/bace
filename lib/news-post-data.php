<?php

function bace_get_slides() {

	$slide_number = isset( $_POST['slideNumber'] ) ? intval( $_POST['slideNumber'] ) : false;
	$nonce = isset( $_POST['security'] ) ? sanitize_text_field( $_POST['security'] ) : false;

	if ( ! $slide_number ) {
		wp_send_json_error( array(
			'error' => 'Slide number not found'
		) );
	}

	if ( wp_verify_nonce( $nonce, 'bace_get_slides' ) ) {
		wp_send_json_error( array(
			'error' => 'Security verification failed'
		) );
	}

	ob_start();
	bace_get_news_slide( $slide_number );
	$slide = ob_get_clean();

	wp_send_json_success( array(
		'slide' => $slide
	) );
}

add_action( 'wp_ajax_bace_get_slides', 'bace_get_slides' );
add_action( 'wp_ajax_nopriv_bace_get_slides', 'bace_get_slides' );

?>
