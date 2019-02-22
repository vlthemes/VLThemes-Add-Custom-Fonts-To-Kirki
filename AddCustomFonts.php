<?php

/**
 * Add custom choice
 */
if ( ! function_exists( 'leedo_add_custom_choice' ) ) {
	function leedo_add_custom_choice() {
		return array(
			'fonts' => apply_filters( 'vlthemes/kirki_font_choices', array() )
		);
	}
}

if ( ! class_exists( 'VLThemesAddCustomFonts' ) ) {
	class VLThemesAddCustomFonts {

		public $custom_fonts = array();

		/**
		 * The single class instance.
		 * @var $_instance
		 */
		private static $_instance = null;

		/**
		 * Main Instance
		 * Ensures only one instance of this class exists in memory at any one time.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
				self::$_instance->init_hooks();
			}
			return self::$_instance;
		}

		public function __construct() {
			// We do nothing here!
		}

		/**
		 * Init hooks
		 */
		public function init_hooks() {
			add_action( 'init', array( $this, 'get_custom_fonts' ) );
			add_filter( 'vlthemes/kirki_font_choices', array( $this, 'add_custom_fonts' ) );
		}

		/**
		 * Get custom fonts from Bsf_Custom_Fonts_Taxonomy
		 */
		public function get_custom_fonts() {
			if ( ! class_exists( 'Bsf_Custom_Fonts_Taxonomy' ) ) {
				return;
			}
			update_option( 'vlt_custom_fonts', Bsf_Custom_Fonts_Taxonomy::get_fonts() );
		}

		public function prepare_custom_fonts() {

			$fonts = get_option( 'vlt_custom_fonts' );
			$new_fonts = array();

			if ( ! empty( $fonts ) ) {
				foreach ( $fonts as $font => $key ) {
					$new_fonts[$font] = array(
						'id' => $font,
						'text' => $font
					);
				}
			}

			return $new_fonts;

		}

		public function prepare_typekit_fonts() {

			$fonts = get_option( 'custom-typekit-fonts' );
			$fonts = $fonts['custom-typekit-font-details'];
			$new_fonts = array();

			if ( ! empty( $fonts ) ) {
				foreach ( $fonts as $font ) {
					$new_fonts[json_encode( $font['css_names'] )] = array(
						'id' => $font['css_names'],
						'text' => $font['family']
					);
				}
			}

			return $new_fonts;

		}

		/**
		 * Add custom fonts to Kirki
		 */
		public function add_custom_fonts( $custom_choice ) {

			$custom_fonts = array_merge( $this->prepare_custom_fonts(), $this->prepare_typekit_fonts() );

			$children = array();
			$variants = array();

			if ( ! empty( $custom_fonts ) ) {

				foreach ( $custom_fonts as $custom_font ) {

					$children[] = array(
						'id' => $custom_font['id'],
						'text' => $custom_font['text']
					);

					$variants[json_encode( $custom_font['id'] )] = array( '200', '300', '400', '400italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', 'regular', 'italic' );

				}

			}

			$custom_choice['families']['custom'] = array(
				'text' => esc_attr__( 'Custom Fonts', '@@textdomain' ),
				'children' => $children
			);

			$custom_choice['variants'] = $variants;

			return $custom_choice;
		}

	}

	VLThemesAddCustomFonts::instance();

}