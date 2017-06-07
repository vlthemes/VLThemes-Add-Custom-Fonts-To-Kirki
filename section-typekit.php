<?php

/*
 * Typekit Settings
 * */

$priority = 0;

Kirki::add_field( 'bershka_customize', array(
	'type' => 'checkbox',
	'settings' => 'enable_typekit',
	'label' => esc_html__('Enable Typekit', 'bershka'),
	'section' => 'section_typekit',
	'default' => '1',
	'priority' => $priority++,
) );

Kirki::add_field( 'bershka_customize', array(
	'type' => 'text',
	'settings' => 'typekit_id',
	'label' => esc_html__('Typekit ID', 'bershka'),
	'section' => 'section_typekit',
	'default' => 'jrw6bgj',
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



Kirki::add_field('bershka_customize', array(
    'type' => 'repeater',
    'label' => esc_html__('Typekit Fonts', 'bershka'),
    'description' => esc_html__('Here you can add typekit fonts', 'bershka'),
    'settings' => 'typekit_fonts',
    'priority' => $priority++,
    'section' => 'section_typekit',
    'row_label' => array(
        'type' => 'text',
        'value' => esc_html__('Font', 'bershka'),
    ),
    'default' => array(
        array(
            'font_name' => 'Essones',
            'font_css_name' => 'essonnes-text',
            'font_fallback' => 'serif',
        ),
        array(
            'font_name' => 'Europa',
            'font_css_name' => 'europa',
            'font_fallback' => 'sans-serif',
        )
    ),
    'fields' => array(
        'font_name' => array(
            'type' => 'text',
            'label' => esc_html__('Name', 'bershka'),
        ),
        'font_css_name' => array(
            'type' => 'text',
            'label' => esc_html__('CSS Name', 'bershka'),
        ),
        'font_fallback' => array(
            'type' => 'select',
            'label' => esc_html__('Fallback', 'bershka'),
            'choices' => array(
                'sans-serif' => esc_html__('Sans Serif', 'bershka'),
                'serif' => esc_html__('Serif', 'bershka'),
            )
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1'
        )
    )
));
