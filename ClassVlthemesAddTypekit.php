/*
 * Add Typekit Fonts
 * */

if(!class_exists('VlthemesAddTypekit')){

	class VlthemesAddTypekit {

		private $_typekit_id;
		public $typekit_enable;
		public $typekit_fonts;
		public static $fonts_sep = ', ';
		public static $typekit_subfont = '"Helvetica Neue", Helvetica, Roboto, Arial, sans-serif';

		public function __construct() {

			$this->_typekit_id = Kirki::get_option('dreamy_customize', 'typekit_id');
			$this->typekit_enable = Kirki::get_option('dreamy_customize', 'enable_typekit');
			$this->typekit_fonts = Kirki::get_option('dreamy_customize', 'typekit_fonts');
			add_action('wp_head', array($this, 'load_typekit'), 0);
			add_filter('kirki/fonts/google_fonts', array($this, 'typekit_add_to_kirki'));

		}

		public function load_typekit() {

			if (!empty($this->_typekit_id) && $this->typekit_enable){
				echo '<script src="//use.typekit.net/'.esc_attr($this->sanitize_typekit_id($this->_typekit_id)) .'.js"></script>';
				echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
			}

		}

		public function sanitize_typekit_id($id) {
			return preg_replace('/[^0-9a-z]+/', '', $id);
		}


		public function typekit_add_to_kirki($google_fonts){

			$my_custom_fonts = array();

			if($this->typekit_enable && !empty($this->_typekit_id)){

				$typekit_fonts = trim($this->typekit_fonts, ' ');
				$typekit_fonts = explode(',', $typekit_fonts);

				foreach($typekit_fonts as $font => $value) {
					$my_custom_fonts[$value] = array(
						'label' => $value,
						'variants' => array(
							'100',
							'100italic',
							'200',
							'200italic',
							'300',
							'300italic',
							'regular',
							'italic',
							'500',
							'500italic',
							'600',
							'600italic',
							'700',
							'700italic',
							'800',
							'800italic',
							'900',
							'900italic',
						),
						'subsets' => array(
							'cyrillic' => 'Cyrillic',
							'cyrillic-ext' => 'Cyrillic Extended',
							'devanagari' => 'Devanagari',
							'greek' => 'Greek',
							'greek-ext' => 'Greek Extended',
							'khmer' => 'Khmer',
							'latin' => 'Latin',
						),
						'subfonts' => self::$typekit_subfont,
						'category' => 'sans-serif',
					);
				}

			}

			return array_merge_recursive($my_custom_fonts, $google_fonts);

		}

	}
}

new VlthemesAddTypekit;