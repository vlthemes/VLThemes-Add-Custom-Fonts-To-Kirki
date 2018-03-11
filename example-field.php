<?php

/**
 * General Fonts
 */

$priority = 0;

$primary_font_variant = array(
	'variant' => array( 'regular', 'italic', '700', '700italic' )
);

Kirki::add_field( 'norfolk_customize', array(
	'type' => 'typography',
	'settings' => 'primary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Primary Font', 'norfolk' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => norfolk_add_custom_choice( $primary_font_variant ),
	'default' => array(
		'font-family' => 'Poppins'
	),
	'output' => array(
		array(
			'element' => '
				.vlt-primary-font
			'
		)
	)
) );