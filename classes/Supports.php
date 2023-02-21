<?php
namespace OkuetuManmaru_Theme;

trait Supports {
  // テーマサポート機能
  public function setup_theme() {
    // ブロックスタイルをサポート
		add_theme_support( 'wp-block-styles' );

		// エディターにstyle.cssをセット
		add_editor_style( 'style.css' );

    // 固定ページの抜粋をサポート
    add_post_type_support( 'page', 'excerpt' );

  }

}
