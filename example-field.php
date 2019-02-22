<?php

/**
 * General Fonts
 */

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'primary_font',
	'section' => 'typography_fonts',
	'label' => esc_html__( 'Primary Font', '@@textdomain' ),
	'priority' => $priority++,
	'transport' => 'auto',
	'choices' => leedo_add_custom_choice(), // add this function here
	'default' => array(
		'font-family' => 'Montserrat'
	),
	'output' => array(
		array(
			'choice' => 'font-family',
			'element' => ':root',
			'property' => '--pf',
			'context' => array( 'editor', 'front' ),
		)
	)
) );