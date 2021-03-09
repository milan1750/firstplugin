<?php 
namespace firstplugin\includes;
class FirstPlugin {

    protected static $instance = null;
    
    function __construct() {
        $this->init();
    }
    
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function init() {
        add_action( 'wp_enqueue_scripts', array($this, 'fp_wp_enqueue_scripts') );
        $this->includes();
        $this->instanciate();
    }

    function includes() {
        include (FP_PLUGIN_PATH .'/includes/activate.php');
        include (FP_PLUGIN_PATH .'/includes/max_adds_post.php');
        include (FP_PLUGIN_PATH .'/includes/metaboxes.php');
    }

    function instanciate () {
        new Activate();
        new MaxAdds();
        new MetaBoxes();
    }

    public function fp_wp_enqueue_scripts() {
        $suffix    = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
        wp_enqueue_style( 'fp_styles', FP_PLUGIN_URL.'assets/css/style.css' );
        wp_enqueue_script( 'fp_scripts', FP_PLUGIN_URL.'assets/js/custom'.$suffix.'.js', array(), '1.0.0', true );
    }
}
