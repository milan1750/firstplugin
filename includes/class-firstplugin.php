<?php
/**
 * Main Class
 *
 * @package FirstPlugin
 */

namespace firstplugin\includes;

/**
 * FirstPlugin Class
 */
class FirstPlugin {

	/**
	 * Instace
	 *
	 * @var $instance
	 */
	protected static $instance = null;

	/***
	 * Constructor
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Creating Instance
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Initialization
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', array( $this, 'fp_wp_enqueue_scripts' ) );
		$this->includes();
		do_action( 'fp_custom_action', array( 'Milan', 'Malla' ), 'first action' );
		$this->instanciate();
	}

	/**
	 * Creating Includes
	 */
	public function includes() {
		include FP_PLUGIN_PATH . '/includes/class-activate.php';
		include FP_PLUGIN_PATH . '/includes/class-maxadds.php';
		include FP_PLUGIN_PATH . '/includes/class-metaboxes.php';
	}

	/**
	 * Activating of other class
	 */
	public function instanciate() {
		new Activate();
		new MaxAdds();
		new MetaBoxes();
	}

	/**
	 * Includes Scripts
	 */
	public function fp_wp_enqueue_scripts() {
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_style( 'fp_styles', FP_PLUGIN_URL . 'assets/css/style.css', array(), '1.0.0' );
		wp_enqueue_script( 'fp_scripts', FP_PLUGIN_URL . 'assets/js/custom' . $suffix . '.js', array(), '1.0.0', true );
	}
}
