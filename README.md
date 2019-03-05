# Add Custom Fonts / Typekit Fonts to Kirki
Extension for Kirki that adds custom fonts to the Typography field. It works with custom fonts or Typekit fonts.

## Getting Started
1. Install [Custom Fonts Plugin](https://wordpress.org/plugins/custom-fonts/) or [Custom Typekit Fonts Plugin](https://wordpress.org/plugins/custom-typekit-fonts/)
2. Setup your fonts
3. Finally you can find your font in Kirki

## Add Custom Choice Function
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

## Credits
Thanks to [MapSteps](https://github.com/MapSteps) for this method.
