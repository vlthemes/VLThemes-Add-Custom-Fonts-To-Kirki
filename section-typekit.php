<?php

/*
 * Typekit Settings
 * */

$priority = 0;

Kirki::add_field( 'dreamy_customize', array(
	'type' => 'checkbox',
	'settings' => 'enable_typekit',
	'label' => esc_html__('Enable Typekit', 'dreamy'),
	'section' => 'section_typekit',
	'default' => '0',
	'priority' => $priority++,
) );

Kirki::add_field( 'dreamy_customize', array(
	'type' => 'text',
	'settings' => 'typekit_id',
	'label' => esc_html__('Typekit ID', 'dreamy'),
	'section' => 'section_typekit',
	'default' => '',
	'priority' => $priority++,
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'enable_typekit',
			'operator' => '==',
			'value' => '1',
		)
	),
) );


Kirki::add_field( 'dreamy_customize', array(
	'type' => 'text',
	'settings' => 'typekit_fonts',
	'label' => esc_html__('Typekit Fonts', 'dreamy'),
	'description' => esc_html__('Enter your typekit fonts separate with coma', 'dreamy'),
	'section' => 'section_typekit',
	'default' => '',
	'priority' => $priority++,
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'enable_typekit',
			'operator' => '==',
			'value' => '1',
		)
	),
) );
