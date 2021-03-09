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
        add_action( 'wp_enqueue_scripts', array( $this, 'fp_wp_enqueue_scripts' ) );
        $this->includes();
        $this->my_actions();
        do_action( 'fp_custom_action', array( 'Milan', 'Malla'), 'first action' );
        $this->instanciate();
    }

    function my_actions() {
        add_action( 'fp_custom_action', array($this, 'fp_cutsom_action_func'), 10, 2 );
        add_filter('working_days', array($this, 'change_working_days'), 10, 2);
        $working_days_first = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' );
        
        
        $data = apply_filters( 
            'working_days', $working_days_first ,
            'from_working_days' 
        );
        print_r( $data );
    }

    public function fp_cutsom_action_func( $array, $action ) {
        // echo 'My name is '.$array[0].' '.$array[1].' and this is the '.$action;
    }

    public function change_working_days($days, $from) {
        if($from == 'from_working_days') {
            array_push($days, 'Saturday');
        }
        return $days;
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
