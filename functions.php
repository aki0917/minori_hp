<?php
/**
 * 農家の店みのり FARM & GARDEN テーマの機能
 *
 * @package Minorihp
 */

// テーマのセットアップ
function minorihp_setup() {
    // テーマの翻訳機能を有効化
    load_theme_textdomain( 'minorihp', get_template_directory() . '/languages' );

    // 自動フィードリンクを有効化
    add_theme_support( 'automatic-feed-links' );

    // タイトルタグのサポート
    add_theme_support( 'title-tag' );

    // アイキャッチ画像のサポート
    add_theme_support( 'post-thumbnails' );

    // HTML5マークアップのサポート
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // カスタムロゴのサポート
    add_theme_support( 'custom-logo', array(
        'height'      => 56,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'minorihp_setup' );

// スタイルシートとスクリプトの読み込み
function minorihp_scripts() {
    // テーマのスタイルシート
    wp_enqueue_style( 'minorihp-style', get_stylesheet_uri(), array(), '1.0.0' );

    // Swiper
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );

    // GSAP
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
    wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array( 'gsap' ), '3.12.5', true );

    // Swiper
    wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true );

    // テーマのJavaScript
    wp_enqueue_script( 'minorihp-main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'minorihp_scripts' );

// メニューの登録
function minorihp_menus() {
    register_nav_menus( array(
        'primary' => __( 'プライマリーメニュー', 'minorihp' ),
    ) );
}
add_action( 'init', 'minorihp_menus' );

// フォールバックメニュー（メニューが設定されていない場合）
function minorihp_fallback_menu() {
    ?>
    <ul class="l-header__nav-list">
        <li class="l-header__nav-item <?php echo is_front_page() ? 'is-active' : ''; ?>">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-header__nav-link" <?php echo is_front_page() ? 'aria-current="page"' : ''; ?>>トップ</a>
        </li>
        <li class="l-header__nav-item">
            <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="l-header__nav-link">会社概要</a>
        </li>
        <li class="l-header__nav-item">
            <a href="<?php echo esc_url( home_url( '/news' ) ); ?>" class="l-header__nav-link">お知らせ</a>
        </li>
        <li class="l-header__nav-item">
            <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="l-header__nav-link">店舗一覧</a>
        </li>
        <li class="l-header__nav-item">
            <a href="https://kkminori-recruit.jp/-/top/" target="_blank" rel="noopener noreferrer" class="l-header__nav-link">募集要項</a>
        </li>
    </ul>
    <?php
}

