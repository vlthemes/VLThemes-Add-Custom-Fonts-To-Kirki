<?php

/**
 * Typekit
 */

$priority = 0;

Kirki::add_field( 'ramsay_customize', array(
    'type' => 'switch',
    'settings' => 'enable_typekit',
    'label' => esc_html__( 'Enable Typekit', 'ramsay' ) ,
    'section' => 'section_typekit',
    'default' => '1',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__( 'Enable', 'ramsay' ),
        'off' => esc_html__( 'Disable', 'ramsay' )
    )
) );

Kirki::add_field( 'ramsay_customize', array(
    'type' => 'text',
    'settings' => 'typekit_id',
    'label' => esc_html__( 'Typekit ID', 'ramsay' ) ,
    'section' => 'section_typekit',
    'default' => 'uex0khw',
    'priority' => $priority++,
    'transport' => 'auto',
    'active_callback' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1',
        )
    ) ,
) );

Kirki::add_field( 'ramsay_customize', array(
    'type' => 'repeater',
    'label' => esc_html__( 'Typekit Fonts', 'ramsay' ) ,
    'description' => esc_html__( 'Here you can add typekit fonts', 'ramsay' ) ,
    'settings' => 'typekit_fonts',
    'priority' => $priority++,
    'transport' => 'auto',
    'section' => 'section_typekit',
    'row_label' => array(
        'type' => 'text',
        'value' => esc_html__( 'Typekit Font', 'ramsay' ) ,
    ),
    'default' => array(
        array(
            'font_name' => 'Azo Sans',
            'font_css_name' => 'azo-sans-web',
            'font_variants' => array( 'regular', 'italic', '700', '700italic' ),
            'font_fallback' => 'sans-serif',
            'font_subsets' => 'latin'
        )
    ),
    'fields' => array(
        'font_name' => array(
            'type' => 'text',
            'label' => esc_html__( 'Name', 'ramsay' ) ,
        ) ,
        'font_css_name' => array(
            'type' => 'text',
            'label' => esc_html__( 'CSS Name', 'ramsay' ) ,
        ) ,
        'font_variants' => array(
            'type' => 'select',
            'label' => esc_html__( 'Variants', 'ramsay' ) ,
            'multiple' => 18,
            'choices' => array(
                '100' => esc_html__( '100', 'ramsay' ) ,
                '100italic' => esc_html__( '100italic', 'ramsay' ) ,
                '200' => esc_html__( '200', 'ramsay' ) ,
                '200italic' => esc_html__( '200italic', 'ramsay' ) ,
                '300' => esc_html__( '300', 'ramsay' ) ,
                '300italic' => esc_html__( '300italic', 'ramsay' ) ,
                'regular' => esc_html__( 'regular', 'ramsay' ) ,
                'italic' => esc_html__( 'italic', 'ramsay' ) ,
                '500' => esc_html__( '500', 'ramsay' ) ,
                '500italic' => esc_html__( '500italic', 'ramsay' ) ,
                '600' => esc_html__( '600', 'ramsay' ) ,
                '600italic' => esc_html__( '600italic', 'ramsay' ) ,
                '700' => esc_html__( '700', 'ramsay' ) ,
                '700italic' => esc_html__( '700italic', 'ramsay' ) ,
                '800' => esc_html__( '800', 'ramsay' ) ,
                '800italic' => esc_html__( '800italic', 'ramsay' ) ,
                '900' => esc_html__( '900', 'ramsay' ) ,
                '900italic' => esc_html__( '900italic', 'ramsay' ) ,
            )
        ),
        'font_fallback' => array(
            'type' => 'select',
            'label' => esc_html__( 'Fallback', 'ramsay' ) ,
            'choices' => array(
                'sans-serif' => esc_html__( 'Helvetica, Arial, sans-serif', 'ramsay' ) ,
                'serif' => esc_html__( 'Georgia, serif', 'ramsay' ) ,
                'display' => esc_html__( '"Comic Sans MS", cursive, sans-serif', 'ramsay' ) ,
                'handwriting' => esc_html__( '"Comic Sans MS", cursive, sans-serif', 'ramsay' ) ,
                'monospace' => esc_html__( '"Lucida Console", Monaco, monospace', 'ramsay' ) ,
            )
        ) ,
        'font_subsets' => array(
            'type' => 'select',
            'label' => esc_html__( 'Subsets', 'ramsay' ) ,
            'multiple' => 7,
            'choices' => array(
                'cyrillic' => esc_html__( 'Cyrillic', 'ramsay' ) ,
                'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'ramsay' ) ,
                'devanagari' => esc_html__( 'Devanagari', 'ramsay' ) ,
                'greek' => esc_html__( 'Greek', 'ramsay' ) ,
                'greek-ext' => esc_html__( 'Greek Extended', 'ramsay' ) ,
                'khmer' => esc_html__( 'Khmer', 'ramsay' ) ,
                'latin' => esc_html__( 'Latin', 'ramsay' ) ,
            )
        ) ,
    ) ,
    'active_callback' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1'
        )
    )
) );