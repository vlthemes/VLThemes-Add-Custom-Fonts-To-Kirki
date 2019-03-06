# Add Custom Fonts / Typekit Fonts to Kirki
Extension for Kirki that adds custom fonts to the Typography field. It works with custom fonts or Typekit fonts.

## Getting Started

### Add this function to your theme
```php
/**
 * Add custom choice
 */
if ( ! function_exists( 'leedo_add_custom_choice' ) ) {
	function leedo_add_custom_choice() {
		return array(
			'fonts' => apply_filters( 'vlthemes/kirki_font_choices', array() )
		);
	}
}
```

### Enter custom choice  function to your typography fields
```php
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
```

### Inlclude class to your theme
```php
include_once( PATH . 'AddCustomFonts.php' );
```

### Install and setup plugins
1. Install [Custom Fonts Plugin](https://wordpress.org/plugins/custom-fonts/) or [Custom Typekit Fonts Plugin](https://wordpress.org/plugins/custom-typekit-fonts/)
2. Setup your fonts
3. Finally you can find your font in Kirki
