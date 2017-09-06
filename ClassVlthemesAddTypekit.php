<?php

/*
 * Add Typekit Fonts
 * */

class themeAddTypekit {
    private $_typekit_id;
    public $typekit_enable;
    public $typekit_fonts;
    public function __construct() {
        $this->_typekit_id = ramsay_get_option( 'typekit_id' );
        $this->typekit_enable = ramsay_get_option( 'enable_typekit' );
        $this->typekit_fonts = ramsay_get_option( 'typekit_fonts' );
        add_action( 'wp_head', array( $this, 'load_typekit' ), 0 );
        add_filter( 'kirki/fonts/google_fonts', array( $this, 'add_typekit_fonts' ) );
    }
    public function load_typekit() {
        if ( ! empty( $this->_typekit_id ) && $this->typekit_enable ){
            echo '<script src="https://use.typekit.net/'.esc_attr( $this->sanitize_typekit_id( $this->_typekit_id ) ) .'.js"></script>';
        }
    }
    public function sanitize_typekit_id( $id ) {
        return preg_replace( '/[^0-9a-z]+/', '', $id );
    }
    public function add_typekit_fonts( $google_fonts ){
        $my_custom_fonts = array();
        if ( $this->typekit_enable && !empty( $this->_typekit_id ) && ! empty( $this->typekit_fonts ) ) {
            foreach( $this->typekit_fonts as $key=>$typekit_font ){
                $my_custom_fonts[ $typekit_font[ 'font_css_name' ] ] = array(
                    'label' => $typekit_font[ 'font_name' ],
                    'variants' => $typekit_font[ 'font_variants' ],
                    'subsets'  => $typekit_font[ 'font_subsets' ],
                    'category' => $typekit_font[ 'font_fallback' ]
                );
            }
        }
        return array_merge_recursive( $my_custom_fonts, $google_fonts );
    }
}

new themeAddTypekit;