<?php 

use \Elementor\Plugin as Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Finestdevs_Extension {
	
	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.6.0';
	const MINIMUM_PHP_VERSION = '5.6';


	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	

	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function i18n() {
		load_plugin_textdomain( 'finestdevs' );
	}

	

	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		//add_action( 'elementor/editor/after_enqueue_styles', array ( $this, 'pawelements_editor_styles' ) );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action('elementor/editor/after_enqueue_scripts', [$this, 'finestdevs_editor_scripts_js'], 100);
		add_action( 'elementor/elements/categories_registered',[$this,'register_new_category']);
		add_action( 'wp_enqueue_scripts', array( $this, 'finestdevs_register_frontend_styles' ), 10 );
		add_action( 'elementor/frontend/before_register_scripts', [ $this, 'finestdevs_register_frontend_scripts' ] );
		
	}

	/**
	 * Load Frontend Script
	 *
	*/
	public function finestdevs_register_frontend_scripts(){

		wp_enqueue_script(
			'justified-gallery',
			FINESTDEVS_ASSETS_VENDOR .'justifiedGallery/js/jquery.justifiedGallery.min.js',
			['jquery'], time(), true
		);

		wp_enqueue_script(
			'finestdevs-widget',
			FINESTDEVS_ASSETS .'js/widget.js',
			['jquery'], time(), true
		);
		
		
	}
	
	
	public function finestdevs_editor_scripts_js(){
		
		wp_enqueue_script(
			'finestdevs-addons-editor',
			FINESTDEVS_ASSETS .'js/editor.js',
			['jquery'], FINESTDEVS_VERSION, true
		);
	}

	
	/**
	 * Load Frontend Styles
	 *
	*/
	public function finestdevs_register_frontend_styles(){

		
		//vendor css
		wp_enqueue_style(
			'justified-gallery',
			FINESTDEVS_ASSETS_VENDOR .'justifiedGallery/css/justifiedGallery.min.css',
			null, '3.7.0'
		);

		wp_enqueue_style(
			'finestdevs-main',
			FINESTDEVS_ASSETS .'css/main.css',
			['bootstrap'], FINESTDEVS_VERSION
		);
		
		wp_enqueue_style(
			'finestdevs-common',
			FINESTDEVS_ASSETS .'css/common.css',
			null, FINESTDEVS_VERSION
		);

		wp_enqueue_style(
			'finestdevs-widget',
			FINESTDEVS_ASSETS .'css/widget.css',
			null, FINESTDEVS_VERSION
		);







	}
	
	/**
	 * Widgets Catgory
	 *
	*/
	public function register_new_category($manager){
	   $manager->add_category('finestdevs',
			[
				'title' => __( 'Finestdevs Helper  Addons', 'finestdevs' ),
			]);
	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'finestdevs' ),
			'<strong>' . esc_html__( 'Elementor Pawelements Extension', 'finestdevs' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'finestdevs' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'finestdevs' ),
			'<strong>' . esc_html__( 'Elementor finestdevs Extension', 'finestdevs' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'finestdevs' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'finestdevs' ),
			'<strong>' . esc_html__( 'Elementor Finestdevs Extension', 'finestdevs' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'finestdevs' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function init_widgets() {

		$widgets_manager = \Elementor\Plugin::instance()->widgets_manager;
		
		//Include Widget files
		require_once( FINESTDEVS_ADDONS_DIR . 'changelog/widget.php' );
		require_once( FINESTDEVS_ADDONS_DIR . 'justified-gallery/widget.php' );

		require_once( FINESTDEVS_PATH . 'inc/modules/custom-css/custom-css.php' );
		require_once( FINESTDEVS_PATH . 'inc/modules/extras/extras.php' );
		require_once( FINESTDEVS_PATH . 'inc/modules/css-transform/css-transform.php' );


	}

	
}

Finestdevs_Extension::instance();
