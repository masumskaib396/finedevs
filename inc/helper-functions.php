<?php 

/**
 * Meta Output
 * 
 * @since 1.0
 * 
 * @return array
 */
if ( ! function_exists( 'finedev_get_meta' ) ) {
    function finedev_get_meta( $data ) {
        global $wp_embed;
        $content = $wp_embed->autoembed( $data );
        $content = $wp_embed->run_shortcode( $content );
        $content = do_shortcode( $content );
        $content = wpautop( $content );
        return $content;
    }
}