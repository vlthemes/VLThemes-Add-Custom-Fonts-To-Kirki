<?php

/**
 * Typekit
 */

$priority = 0;

Kirki::add_field( 'norfolk_customize', array(
    'type' => 'switch',
    'settings' => 'enable_typekit',
    'section' => 'section_typekit',
    'label' => esc_html__( 'Enable Typekit', 'norfolk' ),
    'description' => esc_html__( 'Turn "Enable" if you want to activate Typekit.', 'norfolk' ),
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__( 'Enable', 'norfolk' ),
        'off' => esc_html__( 'Disable', 'norfolk' )
    ),
    'default' => '0',
) );

Kirki::add_field( 'norfolk_customize', array(
    'type' => 'text',
    'settings' => 'typekit_id',
    'section' => 'section_typekit',
    'label' => esc_html__( 'Typekit ID', 'norfolk' ),
    'description' => esc_html__( 'Enter the ID of your kit.', 'norfolk' ),
    'tooltip' => '<a target="_blank" href="'.esc_url( 'https://helpx.adobe.com/typekit/using/add-fonts-website.html' ).'">'.esc_html__( 'Read More', 'norfolk' ).'</a>',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => '',
    'active_callback' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1',
        )
    ),
) );

Kirki::add_field( 'norfolk_customize', array(
    'type' => 'repeater',
    'settings' => 'typekit_fonts',
    'section' => 'section_typekit',
    'label' => esc_html__( 'Typekit Fonts', 'norfolk' ) ,
    'description' => esc_html__( 'Here you can add typekit fonts.', 'norfolk' ),
    'priority' => $priority++,
    'transport' => 'auto',
    'row_label' => array(
        'type' => 'text',
        'value' => esc_html__( 'Typekit Font', 'norfolk' ) ,
    ),
    'fields' => array(
        'font_id' => array(
            'type' => 'text',
            'label' => esc_html__( 'ID', 'norfolk' ) ,
        ) ,
        'font_text' => array(
            'type' => 'text',
            'label' => esc_html__( 'Text', 'norfolk' ) ,
        ) ,
        'font_variants' => array(
            'type' => 'select',
            'label' => esc_html__( 'Variants', 'norfolk' ) ,
            'multiple' => 18,
            'choices' => array(
                '100' => esc_html__( '100', 'norfolk' ) ,
                '100italic' => esc_html__( '100italic', 'norfolk' ) ,
                '200' => esc_html__( '200', 'norfolk' ) ,
                '200italic' => esc_html__( '200italic', 'norfolk' ) ,
                '300' => esc_html__( '300', 'norfolk' ) ,
                '300italic' => esc_html__( '300italic', 'norfolk' ) ,
                'regular' => esc_html__( 'regular', 'norfolk' ) ,
                'italic' => esc_html__( 'italic', 'norfolk' ) ,
                '500' => esc_html__( '500', 'norfolk' ) ,
                '500italic' => esc_html__( '500italic', 'norfolk' ) ,
                '600' => esc_html__( '600', 'norfolk' ) ,
                '600italic' => esc_html__( '600italic', 'norfolk' ) ,
                '700' => esc_html__( '700', 'norfolk' ) ,
                '700italic' => esc_html__( '700italic', 'norfolk' ) ,
                '800' => esc_html__( '800', 'norfolk' ) ,
                '800italic' => esc_html__( '800italic', 'norfolk' ) ,
                '900' => esc_html__( '900', 'norfolk' ) ,
                '900italic' => esc_html__( '900italic', 'norfolk' ) ,
            )
        ),
    ),
    'default' => '',
    'active_callback' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1'
        )
    )
) );
