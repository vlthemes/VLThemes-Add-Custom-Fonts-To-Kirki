<?php

class AddTypekitFonts {

	/**
	 * [__construct]
	 * @param string $typekit_id
	 */
	public function __construct( $typekit_id = '' ) {

		$theme_info = wp_get_theme();
		$this->theme_version = $theme_info[ 'Version' ];
		$this->typekit_id = $typekit_id;

		add_action( 'wp_enqueue_scripts', array( $this, 'load_typekit' ) );

	}

	public function load_typekit() {
		wp_enqueue_style( 'typekit', 'https://use.typekit.net/'.esc_attr( $this->sanitize_typekit_id( $this->typekit_id ) ) .'.css', array(), $this->theme_version );
	}

	/**
	 * [sanitize_typekit_id]
	 * @param string $typekit_id
	 * @return string
	 */
	public function sanitize_typekit_id( $typekit_id ) {
		return preg_replace( '/[^0-9a-z]+/', '', $typekit_id );
	}

}

/**
 * [norfolk_add_custom_choice]
 * @param array $default_variants [Default variants for this Typography fields.]
 */

function norfolk_add_custom_choice( $custom_choice = array() ) {

	if ( !get_theme_mod( 'enable_typekit' ) ) {
		return $custom_choice;
	}

	/**
	 * [$typekit_id]
	 * @var string
	 */
	$typekit_id = get_theme_mod( 'typekit_id' );

	/**
	 * [$typekit_fonts]
	 * @var array
	 */
	$typekit_fonts = get_theme_mod( 'typekit_fonts' );

	if ( !empty( $typekit_id ) ) {
		new AddTypekitFonts( $typekit_id );
	}

	/**
	 * [$children]
	 * @var array
	 */
	$children = array();

	/**
	 * [$variants]
	 * @var array
	 */
	$variants = array();

	foreach( $typekit_fonts as $key => $typekit_font ){
		$children[] = array(
			'id' => $typekit_font[ 'font_id' ],
			'text' => $typekit_font[ 'font_text' ],
		);
		$variants[ $typekit_font[ 'font_id' ] ] = $typekit_font[ 'font_variants' ];
	}

	/**
	 * [$choices]
	 * @var array
	 */
	$choices = array(
		'fonts' => array(
			'standard' => array(
				'serif',
				'sans-serif',
			),
			'families' => array(
				'custom' => array(
					'text' => esc_html__( 'Typekit Fonts', 'norfolk' ),
					'children' => $children,
				),
			),
			'variants' => $variants,
		)
	);

	$choices = array_merge( $choices, $custom_choice );

	return apply_filters( 'norfolk/add_custom_choice', $choices );

}
