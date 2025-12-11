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

// ページごとの追加スクリプト
// ※ shop-detail.js は静的HTML用の上書きスクリプトのため、WP化後は読み込まない
function minorihp_page_scripts() {
    if ( is_page_template( 'page-shop.php' ) ) {
        // 必要になったらここで専用スクリプトを読み込む
    }
}
add_action( 'wp_enqueue_scripts', 'minorihp_page_scripts' );

// カスタム投稿タイプ: 店舗情報
function minorihp_register_post_types() {
    // 店舗情報
    $shop_labels = array(
        'name'               => '店舗',
        'singular_name'      => '店舗',
        'menu_name'          => '店舗',
        'name_admin_bar'     => '店舗',
        'add_new'            => '新規追加',
        'add_new_item'       => '店舗を追加',
        'new_item'           => '新規店舗',
        'edit_item'          => '店舗を編集',
        'view_item'          => '店舗を表示',
        'all_items'          => '店舗一覧',
        'search_items'       => '店舗を検索',
        'not_found'          => '店舗が見つかりません',
        'not_found_in_trash' => 'ゴミ箱に店舗はありません',
    );

    register_post_type(
        'shop',
        array(
            'labels'             => $shop_labels,
            'public'             => true,
            'has_archive'        => false,
            'show_in_rest'       => true,
            'menu_position'      => 20,
            'menu_icon'          => 'dashicons-store',
            'rewrite'            => array( 'slug' => 'shop', 'with_front' => false ),
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'publicly_queryable' => true,
            'show_ui'            => true,
        )
    );
}
add_action( 'init', 'minorihp_register_post_types' );

// メニューの登録
function minorihp_menus() {
    register_nav_menus( array(
        'primary' => __( 'プライマリーメニュー', 'minorihp' ),
    ) );
}
add_action( 'init', 'minorihp_menus' );

// /news のURLで投稿アーカイブを表示するためのリライトルールを追加
function minorihp_add_news_rewrite_rule() {
    add_rewrite_rule( '^news/?$', 'index.php?post_type=post', 'top' );
    add_rewrite_rule( '^news/page/([0-9]+)/?$', 'index.php?post_type=post&paged=$matches[1]', 'top' );
}
add_action( 'init', 'minorihp_add_news_rewrite_rule' );

// リライトルールのフラッシュ（初回のみ実行）
function minorihp_flush_rewrite_rules_once() {
    if ( ! get_option( 'minorihp_rewrite_rules_flushed' ) ) {
        minorihp_add_news_rewrite_rule();
        flush_rewrite_rules();
        update_option( 'minorihp_rewrite_rules_flushed', true );
    }
}
add_action( 'init', 'minorihp_flush_rewrite_rules_once', 20 );

// /news のリクエスト時にクエリを修正
function minorihp_news_pre_get_posts( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        $request_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
        if ( $request_uri === 'news' || $request_uri === 'news/' ) {
            $query->set( 'post_type', 'post' );
            $query->set( 'posts_per_page', get_option( 'posts_per_page' ) );
            $query->is_home = false;
            $query->is_archive = true;
            $query->is_post_type_archive = true;
        }
    }
}
add_action( 'pre_get_posts', 'minorihp_news_pre_get_posts' );

// /news のリクエスト時に archive.php テンプレートを強制的に使用
function minorihp_news_template_include( $template ) {
    $request_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
    if ( $request_uri === 'news' || $request_uri === 'news/' ) {
        $archive_template = locate_template( 'archive.php' );
        if ( $archive_template ) {
            return $archive_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'minorihp_news_template_include' );

// お知らせページのURLを取得する関数
function minorihp_get_news_url() {
    // /news のURLを返す
    return home_url( '/news' );
}

// メニュー項目のURLを修正（お知らせリンクを確実に正しいURLにする）
function minorihp_fix_menu_item_urls( $items, $args ) {
    if ( ! isset( $args->theme_location ) || $args->theme_location !== 'primary' ) {
        return $items;
    }
    
    // お知らせの正しいURLを取得
    $news_url = minorihp_get_news_url();
    
    foreach ( $items as $item ) {
        // 「お知らせ」というタイトルを含むメニュー項目を検索
        if ( stripos( $item->title, 'お知らせ' ) !== false ) {
            // 常に /news のURLに修正
            $item->url = $news_url;
        }
    }
    
    return $items;
}
add_filter( 'wp_nav_menu_objects', 'minorihp_fix_menu_item_urls', 10, 2 );

// フォールバックメニュー（メニューが設定されていない場合）
function minorihp_fallback_menu() {
    // 現在のページを判定
    $is_about = is_page_template( 'page-about.php' ) || ( is_page() && strpos( get_permalink(), '/about' ) !== false );
    
    // お知らせの判定：トップページの場合は除外
    $is_news = false;
    if ( ! is_front_page() ) {
        $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' ) : '';
        $is_news = ( $request_uri === 'news' || $request_uri === 'news/' ) 
                || ( is_archive() && get_query_var( 'post_type' ) === 'post' )
                || ( is_home() && ! is_front_page() )
                || is_singular( 'post' );
    }
    
    $is_shop = is_page_template( 'page-shop.php' ) || is_post_type_archive( 'shop' ) || is_singular( 'shop' ) || ( isset( $_SERVER['REQUEST_URI'] ) && strpos( $_SERVER['REQUEST_URI'], '/shop' ) !== false );
    ?>
    <ul class="l-header__nav-list">
        <li class="l-header__nav-item <?php echo is_front_page() ? 'is-active' : ''; ?>">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="l-header__nav-link" <?php echo is_front_page() ? 'aria-current="page"' : ''; ?>>トップ</a>
        </li>
        <li class="l-header__nav-item <?php echo $is_about ? 'is-active' : ''; ?>">
            <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="l-header__nav-link" <?php echo $is_about ? 'aria-current="page"' : ''; ?>>会社概要</a>
        </li>
        <li class="l-header__nav-item <?php echo $is_news ? 'is-active' : ''; ?>">
            <a href="<?php echo esc_url( minorihp_get_news_url() ); ?>" class="l-header__nav-link" <?php echo $is_news ? 'aria-current="page"' : ''; ?>>お知らせ</a>
        </li>
        <li class="l-header__nav-item <?php echo $is_shop ? 'is-active' : ''; ?>">
            <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="l-header__nav-link" <?php echo $is_shop ? 'aria-current="page"' : ''; ?>>店舗一覧</a>
        </li>
        <li class="l-header__nav-item">
            <a href="<?php echo esc_url( 'https://kkminori-recruit.jp/-/top/' ); ?>" target="_blank" rel="noopener noreferrer" class="l-header__nav-link">募集要項</a>
        </li>
    </ul>
    <?php
}

