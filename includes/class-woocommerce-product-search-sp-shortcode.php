<?php 

/**
 * To avoid some obscure problems if anyone wants to replace the shortcode.
 * So add a method to provide the class instance
 */

if(!class_exists('woocommerceProductSearchSpShortcode')){
 final class WoocommerceProductSearchSpShortcode
{
    private $var = 'foo';

    public function __construct()
    {
        add_filter( 'get_wps_plugin_instance', [ $this, 'get_instance' ] );
    }

    public function get_instance()
    {
        return $this; // return the object
    }

    public function shortcode()
    {
        // $search = 
        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/search.php';
        // return $this->var; // never echo or print in a shortcode!
    }
}

}
add_shortcode( 'woocommerce-product-search-sp', [ new WoocommerceProductSearchSpShortcode, 'shortcode' ] );


/**  
 * Now, when someone wants to get the object instance, s/he just has to write
 */

// $shortcode_handler = apply_filters( 'get_wps_plugin_instance', NULL );
// if ( is_a( $shortcode_handler, 'WoocommerceProductSearchSpShortcode ' ) )
// {
//     // do something with that instance.
// }




?>