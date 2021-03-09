<?php 
namespace firstplugin\includes;
use firstplugin\includes\activate;
use firstplugin\includes\MaxAdds;
use firstplugin\includes\MetaBoxes;

class FirstPlugin {

    
    protected static $instance = null;

    protected $metabox;
    
    protected $activate;

    protected $maxadds;

    
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

    private function instanciate() {
        $this->activate = new Activate();
        $this->maxadds = new MaxAdds();
        $this->metabox = new MetaBoxes();
        
    }
    
    public function includes() {
        include ( FP_PLUGIN_PATH. '/includes/activate.php' );
        include ( FP_PLUGIN_PATH. '/includes/max_adds_post.php' );
        include ( FP_PLUGIN_PATH. '/includes/metaboxes.php' );
    }

    public function fp_wp_enqueue_scripts() {
        $suffix    = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
        wp_enqueue_style( 'fp_styles', FP_PLUGIN_URL.'assets/css/style.css' );
        wp_enqueue_script( 'fp_scripts', FP_PLUGIN_URL.'assets/js/custom'.$suffix.'.js', array(), '1.0.0', true );
    }
}
