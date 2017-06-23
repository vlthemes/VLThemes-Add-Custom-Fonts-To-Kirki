<?php

/*
 * Add Typekit Fonts
 * */


class VlthemesAddTypekit {
    private $_typekit_id;
    public $typekit_enable;
    public $typekit_fonts;
    public static $fonts_sep = ', ';
    public function __construct() {
        $this->_typekit_id = osmos_get_option('typekit_id');
        $this->typekit_enable = osmos_get_option('enable_typekit');
        $this->typekit_fonts = osmos_get_option('typekit_fonts');
        add_action('wp_head', array($this, 'load_typekit'), 0);
        add_filter('kirki/fonts/google_fonts', array($this, 'typekit_add_to_kirki'));
    }
    public function load_typekit() {
        if (!empty($this->_typekit_id) && $this->typekit_enable){
            echo '<script src="https://use.typekit.net/'.esc_attr($this->sanitize_typekit_id($this->_typekit_id)) .'.js"></script>';
            echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
        }
    }
    public function sanitize_typekit_id($id) {
        return preg_replace('/[^0-9a-z]+/', '', $id);
    }
    public function typekit_add_to_kirki($google_fonts){
        $my_custom_fonts = array();
        if($this->typekit_enable && !empty($this->_typekit_id && $this->typekit_fonts)){

            foreach($this->typekit_fonts as $key=>$typekit_font){

                $my_custom_fonts[$typekit_font['font_css_name']] = array(
                    'label' => $typekit_font['font_name'],
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
                    'category' => $typekit_font['font_fallback']
                );
            }
        }
        return array_merge_recursive( $my_custom_fonts, $google_fonts );
    }
}

new VlthemesAddTypekit;

