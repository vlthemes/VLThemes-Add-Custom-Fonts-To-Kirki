<?php

/*
* Typekit Settings
* */

$priority = 0;

Kirki::add_field('osmos_customize', array(
    'type' => 'switch',
    'settings' => 'enable_typekit',
    'label' => esc_html__('Enable Typekit', 'osmos') ,
    'section' => 'section_typekit',
    'default' => '1',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Enable', 'osmos'),
        'off' => esc_html__('Disable', 'osmos')
    )
));

Kirki::add_field('osmos_customize', array(
    'type' => 'text',
    'settings' => 'typekit_id',
    'label' => esc_html__('Typekit ID', 'osmos') ,
    'section' => 'section_typekit',
    'default' => 'fyf1uam',
    'priority' => $priority++,
    'transport' => 'auto',
    'required' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1',
        )
    ) ,
));
Kirki::add_field('osmos_customize', array(
    'type' => 'repeater',
    'label' => esc_html__('Typekit Fonts', 'osmos') ,
    'description' => esc_html__('Here you can add typekit fonts', 'osmos') ,
    'settings' => 'typekit_fonts',
    'priority' => $priority++,
    'transport' => 'auto',
    'section' => 'section_typekit',
    'row_label' => array(
        'type' => 'text',
        'value' => esc_html__('Typekit Font', 'osmos') ,
    ),
    'default' => array(
        array(
            'font_name' => 'Sofia Pro',
            'font_css_name' => 'sofia-pro',
            'font_fallback' => 'sans-serif',
            'font_subsets' => 'cyrillic',
            'font_variants' => array('300', '300italic', 'regular', 'italic', '500', '700')
        ),
    ),
    'fields' => array(
        'font_name' => array(
            'type' => 'text',
            'label' => esc_html__('Name', 'osmos') ,
        ) ,
        'font_css_name' => array(
            'type' => 'text',
            'label' => esc_html__('CSS Name', 'osmos') ,
        ) ,
        'font_variants' => array(
            'type' => 'select',
            'label' => esc_html__('Variants', 'osmos') ,
            'multiple' => 18,
            'choices' => array(
                '100' => esc_html__('100', 'osmos') ,
                '100italic' => esc_html__('100italic', 'osmos') ,
                '200' => esc_html__('200', 'osmos') ,
                '200italic' => esc_html__('200italic', 'osmos') ,
                '300' => esc_html__('300', 'osmos') ,
                '300italic' => esc_html__('300italic', 'osmos') ,
                'regular' => esc_html__('regular', 'osmos') ,
                'italic' => esc_html__('italic', 'osmos') ,
                '500' => esc_html__('500', 'osmos') ,
                '500italic' => esc_html__('500italic', 'osmos') ,
                '600' => esc_html__('600', 'osmos') ,
                '600italic' => esc_html__('600italic', 'osmos') ,
                '700' => esc_html__('700', 'osmos') ,
                '700italic' => esc_html__('700italic', 'osmos') ,
                '800' => esc_html__('800', 'osmos') ,
                '800italic' => esc_html__('800italic', 'osmos') ,
                '900' => esc_html__('900', 'osmos') ,
                '900italic' => esc_html__('900italic', 'osmos') ,
            )
        ),
        'font_fallback' => array(
            'type' => 'select',
            'label' => esc_html__('Fallback', 'osmos') ,
            'choices' => array(
                'sans-serif' => esc_html__('Helvetica, Arial, sans-serif', 'osmos') ,
                'serif' => esc_html__('Georgia, serif', 'osmos') ,
                'display' => esc_html__('"Comic Sans MS", cursive, sans-serif', 'osmos') ,
                'handwriting' => esc_html__('"Comic Sans MS", cursive, sans-serif', 'osmos') ,
                'monospace' => esc_html__('"Lucida Console", Monaco, monospace', 'osmos') ,
            )
        ) ,
        'font_subsets' => array(
            'type' => 'select',
            'label' => esc_html__('Subsets', 'osmos') ,
            'multiple' => 7,
            'choices' => array(
                'cyrillic' => esc_html__('Cyrillic', 'osmos') ,
                'cyrillic-ext' => esc_html__('Cyrillic Extended', 'osmos') ,
                'devanagari' => esc_html__('Devanagari', 'osmos') ,
                'greek' => esc_html__('Greek', 'osmos') ,
                'greek-ext' => esc_html__('Greek Extended', 'osmos') ,
                'khmer' => esc_html__('Khmer', 'osmos') ,
                'latin' => esc_html__('Latin', 'osmos') ,
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
));

