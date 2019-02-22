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
			add_action( 'init', array( $this, 'get_fonts' ) );
			add_filter( 'vlthemes/kirki_font_choices', array( $this, 'add_fonts' ) );
		}

		/**
		 * Get fonts from Bsf_Custom_Fonts_Taxonomy
		 */
		public function get_fonts() {
			if ( ! class_exists( 'Bsf_Custom_Fonts_Taxonomy' ) ) {
				return;
			}
			update_option( 'vlt_custom_fonts', Bsf_Custom_Fonts_Taxonomy::get_fonts() );
		}

		/**
		 * Add fonts to Kirki
		 */
		public function add_fonts( $custom_choice ) {

			$fonts = get_option( 'vlt_custom_fonts' );
			$children = array();
			$variants = array();

			if ( ! empty( $fonts ) ) {

				foreach ( $fonts as $font => $key ) {

					$children[] = array(
						'id' => $font,
						'text' => $font
					);

					$variants[$font] = array( '200', '300', '400', '400italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', 'regular', 'italic' );

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