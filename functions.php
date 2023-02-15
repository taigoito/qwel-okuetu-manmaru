<?php
/**
 * Okuetu Manmaru functions
 * Author: Taigo Ito (https://qwel.design/)
 * Location: Fukui, Japan
 * @package Okuetu-Manmaru
 */

/*
 * テーマのパス, URI
 */
define( 'OkuetuManmaru_THEME_DIR', get_template_directory() );
define( 'OkuetuManmaru_THEME_URI', get_template_directory_uri() );


/*
 * classのオートロード
 */
spl_autoload_register(
	function( $classname ) {
		if ( strpos( $classname, 'OkuetuManmaru_Theme' ) === false ) return;
		$classname = str_replace( '\\', '/', $classname );
		$classname = str_replace( 'OkuetuManmaru_Theme/', '', $classname );
		$file      = OkuetuManmaru_THEME_DIR . '/classes/' . $classname . '.php';
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

/*
 * Hookする関数群を継承して登録
 */
class OkuetuManmaru {
	use	\OkuetuManmaru_Theme\Supports,
		\OkuetuManmaru_Theme\Scripts,
		\OkuetuManmaru_Theme\Shortcodes;
		
	public function __construct() {
		// テーマサポート機能
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

		// CSS, JSファイルを読み込み
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		// ショートコード登録
		add_action( 'init', [ $this, 'register_shortcode' ] );
	}
}

/**
 * OkuetuManmaru start!
 */
new OkuetuManmaru();
