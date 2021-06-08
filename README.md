# Add Custom Fonts / Typekit Fonts to Kirki
Extension for Kirki that adds custom fonts to the Typography field. It works with custom fonts or Typekit fonts.

## Getting Started

### Add this function to your theme
```php
add_filter( 'vlthemes_fonts_choices', [ $this, 'kirki_fonts_choices' ] );

/**
* Add support wp-custom-fonts in Kirki
*/
public function kirki_fonts_choices( $settings = [] ) {

	$fonts_list = apply_filters( 'vlthemes_fonts_list', [] );

	if ( ! $fonts_list ) {
		return $settings;
	}

	$fonts_settings = [
		'fonts' => [
			'google' => [],
			'families' => isset( $fonts_list[ 'families' ] ) ? $fonts_list[ 'families' ] : null,
			'variants' => isset( $fonts_list[ 'variants' ] ) ? $fonts_list[ 'variants' ] : null
		]
	];

	$fonts_settings = array_merge( (array) $fonts_settings, (array) $settings );

	return $fonts_settings;
}
```

### Enter custom choice  function to your typography fields
```php
'choices' => apply_filters(
	'vlthemes_fonts_choices', [
		'variant' => [
			'300',
			'regular',
			'500',
			'600',
			'700',
		]
	]
),
```

### Include class to your theme
```php
include_once( PATH . 'AddCustomFonts.php' );
```

### Install and setup plugins
1. Install [Custom Fonts Plugin](https://wordpress.org/plugins/custom-fonts/) or [Custom Typekit Fonts Plugin](https://wordpress.org/plugins/custom-typekit-fonts/)
2. Setup your fonts
3. Finally you can find your font in Kirki
