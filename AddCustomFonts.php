<?php

/**
 * @author: VLThemes
 * @version: 1.0
 */

if ( ! class_exists( 'VLThemesAddCustomFonts' ) ) {
	class VLThemesAddCustomFonts {

		/**
		 * Custom fonts array
		 */
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
			update_option( 'vlthemes-custom-fonts', Bsf_Custom_Fonts_Taxonomy::get_fonts() );
		}

		/**
		 * Prepare custom fonts
		 */
		public function prepare_custom_fonts() {

			$new_fonts = array();
			$fonts = get_option( 'vlthemes-custom-fonts' );

			if ( ! empty( $fonts ) ) {
				foreach ( $fonts as $font => $key ) {
					$new_fonts[$font] = array(
						'id' => $font,
						'text' => $font,
						'variant' => array( '200', '300', '400', '400italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', 'regular', 'italic' )
					);
				}
			}

			return $new_fonts;

		}

		/**
		 * Prepare Typekit fonts
		 */
		public function prepare_typekit_fonts() {

			$new_fonts = array();
			$fonts = get_option( 'custom-typekit-fonts' );
			$fonts = $fonts['custom-typekit-font-details'];

			if ( ! empty( $fonts ) ) {
				foreach ( $fonts as $key => $font ) {

					$new_fonts[$key] = array(
						'id' => json_encode( $font['css_names'] ),
						'text' => json_encode( $font['family'] ),
						'variant' => $font['weights']
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

					$variants[$custom_font['id']] = $custom_font['variant'];

				}

			}

			$custom_choice['families']['custom'] = array(
				'text' => esc_attr__( 'Custom Fonts', 'vlthemes' ),
				'children' => $children
			);

			$custom_choice['variants'] = $variants;

			return $custom_choice;
		}

	}

	VLThemesAddCustomFonts::instance();

}