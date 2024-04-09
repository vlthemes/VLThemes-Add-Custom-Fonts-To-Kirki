<?php

VLT_Options::add_field( array(
	'type' => 'typography',
	'settings' => 'text_typography',
	'section' => 'typography_text',
	'label' => '<span class="dashicons dashicons-desktop" style="margin-right: 5px;"></span>' . esc_html__( 'Desktop', '@@textdomain' ),
	'priority' => $priority++,
	'choices' => apply_filters(
		'vlthemes_fonts_choices', [
			'variant' => [
				'regular',
				'500',
				'600',
				'700',
			]
		]
	),
	'default' => array(
		'font-family' => 'Inter',
		'subsets' => [ 'latin' ],
		'variant' => 'regular',
		'font-size' => '1rem',
		'line-height' => '1.625',
		'letter-spacing' => '0',
		'text-transform' => 'none'
	),
	'output' => array(
		array(
			'element' => 'body'
		),
		array(
			'element' => '.edit-post-visual-editor.editor-styles-wrapper',
			'context' => array( 'editor' ),
		),
	)
) );
