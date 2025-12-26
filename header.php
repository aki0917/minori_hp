<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- トップページ専用のmeta description -->
  <?php if ( is_front_page() || is_home() ) : ?>
    <meta name="description" content="農家の店みのりは、農業資材・農薬・肥料・種苗・園芸用品を扱う専門店です。栃木県・茨城県に9店舗を展開し、プロ農家から家庭菜園まで幅広く対応しています。">
  <?php else : ?>
    <meta name="description" content="<?php echo esc_attr( wp_trim_words( get_the_excerpt() ?: get_the_content(), 30 ) ); ?>">
  <?php endif; ?>
  
  <?php wp_head(); ?>
  
  <!-- OGP -->
  <meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>">
  <meta property="og:title" content="<?php echo esc_attr( wp_get_document_title() ); ?>">
  <meta property="og:description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ?: '農業資材、農薬、肥料、機械など生産資材から、野菜・花の種や苗を扱う大型の専門店。栃木県、茨城県に9店舗を展開しており、取り扱いアイテム数は3万点以上です。' ); ?>">
  <meta property="og:url" content="<?php echo esc_url( get_permalink() ?: home_url() ); ?>">
  <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
  <meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() . '/assets/img/common/logo-1.png' ); ?>">
  <meta property="og:locale" content="ja_JP">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr( wp_get_document_title() ); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ?: '農業資材、農薬、肥料、機械など生産資材から、野菜・花の種や苗を扱う大型の専門店。栃木県、茨城県に9店舗を展開しており、取り扱いアイテム数は3万点以上です。' ); ?>">
  <meta name="twitter:image" content="<?php echo esc_url( get_template_directory_uri() . '/assets/img/common/logo-1.png' ); ?>">
  
  <!-- Canonical -->
  <link rel="canonical" href="<?php echo esc_url( get_permalink() ?: home_url() ); ?>">
  
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/icon/aaa1.ico' ); ?>">
  <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/icon/aaa1.ico' ); ?>">
  
  <!-- ============================================ -->
  <!-- 共通構造化データ（全ページ共通） -->
  <!-- ============================================ -->
  
  <?php if ( is_front_page() || is_home() ) : ?>
  <!-- Organization（トップページ専用・シンプル版） -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "農家の店みのり FARM & GARDEN",
    "url": "https://noukanomiseminori.com/",
    "logo": "https://noukanomiseminori.com/assets/img/common/logo-1.png",
    "description": "農業資材・農薬・肥料・種苗・園芸用品を扱う専門店。栃木県・茨城県に9店舗を展開。",
    "areaServed": ["栃木県", "茨城県"],
    "sameAs": [
      "https://www.instagram.com/noukanomiseminori/",
      "https://www.rakuten.co.jp/kminori/",
      "https://store.shopping.yahoo.co.jp/noyaku-com/",
      "https://www.amazon.co.jp/s?i=merchant-items&me=A2EFHFKX98OBK5"
    ]
  }
  </script>
  <?php endif; ?>
  
  <!-- Organization（企業情報・詳細版） -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "株式会社みのり",
    "legalName": "株式会社みのり",
    "alternateName": "農家の店みのりFARM & GARDEN",
    "url": "https://www.noukanomiseminori.com",
    "logo": "https://www.noukanomiseminori.com/assets/img/common/logo-1.png",
    "description": "農業資材、農薬、肥料、機械など生産資材から、野菜・花の種や苗を扱う大型の専門店。栃木県、茨城県に9店舗を展開しており、取り扱いアイテム数は3万点以上です。",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "大田原市",
      "addressRegion": "栃木県",
      "postalCode": "324-0047",
      "streetAddress": "美原1-3138-2"
    },
    "telephone": "0287-23-2211",
    "foundingDate": "1992-04",
    "numberOfEmployees": {
      "@type": "QuantitativeValue",
      "value": "120"
    },
    "knowsAbout": [
      "農業資材販売",
      "園芸用品",
      "土壌診断",
      "施肥設計",
      "農薬適正使用"
    ],
    "founder": {
      "@type": "Person",
      "name": "郡司 健",
      "jobTitle": "代表取締役"
    },
    "employee": [
      {
        "@type": "Person",
        "jobTitle": "販売スタッフ",
        "description": "勤続20年以上。毒劇物取扱責任者、販売士2級・グリーンアドバイザー保有のベテランスタッフが在籍。"
      }
    ],
    "areaServed": [
      {
        "@type": "State",
        "name": "栃木県"
      },
      {
        "@type": "State",
        "name": "茨城県"
      }
    ],
    "sameAs": [
      "<?php echo esc_url_raw( 'https://www.instagram.com/noukanomiseminori/' ); ?>",
      "<?php echo esc_url_raw( 'https://www.rakuten.co.jp/kminori/' ); ?>",
      "<?php echo esc_url_raw( 'https://store.shopping.yahoo.co.jp/noyaku-com/' ); ?>"
    ]
  }
  </script>
  
  <!-- WebSite -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "農家の店みのりFARM & GARDEN",
    "url": "https://www.noukanomiseminori.com"
  }
  </script>
  
  <!-- BreadcrumbList（パンくず） -->
  <?php
  $breadcrumbs = array();
  if ( ! is_front_page() ) {
    $breadcrumbs[] = array(
      '@type' => 'ListItem',
      'position' => 1,
      'name' => 'ホーム',
      'item' => home_url()
    );
  }
  if ( is_singular() ) {
    $breadcrumbs[] = array(
      '@type' => 'ListItem',
      'position' => count( $breadcrumbs ) + 1,
      'name' => get_the_title(),
      'item' => get_permalink()
    );
  }
  ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": <?php echo wp_json_encode( $breadcrumbs ); ?>
  }
  </script>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  
  <header class="l-header" role="banner">
    <div class="l-header__inner">
      <h1 class="l-header__logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="農家の店みのりFARM &amp; GARDEN ホーム">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/common/logo-1.png' ); ?>" alt="農家の店みのりFARM &amp; GARDEN">
        </a>
      </h1>
      <button class="l-header__toggle" type="button" aria-controls="global-nav" aria-expanded="false" aria-label="メニューを開く">
        <span class="l-header__toggle-bar"></span>
        <span class="l-header__toggle-bar"></span>
        <span class="l-header__toggle-bar"></span>
      </button>
      <div class="l-header__overlay" aria-hidden="true"></div>
      <nav id="global-nav" class="l-header__nav" role="navigation" aria-label="グローバルナビゲーション">
        <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'l-header__nav-list',
          'fallback_cb'    => 'minorihp_fallback_menu',
        ) );
        ?>
        <div class="l-header__nav-social">
          <div class="l-header__nav-social-group">
            <div class="l-header__nav-social-label">みのり各店</div>
            <a href="<?php echo esc_url( 'https://www.instagram.com/noukanomiseminori/' ); ?>" target="_blank" rel="noopener noreferrer" class="l-header__nav-social-link" aria-label="Instagram">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icon/icon_instagram.svg' ); ?>" alt="" width="24" height="24">
            </a>
          </div>
          <div class="l-header__nav-social-group">
            <div class="l-header__nav-social-label">インターパーク店</div>
            <div class="l-header__nav-social-links">
              <a href="<?php echo esc_url( 'https://www.instagram.com/minori_kaboku_interpark/' ); ?>" target="_blank" rel="noopener noreferrer" class="l-header__nav-social-link" aria-label="Instagram">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icon/icon_instagram.svg' ); ?>" alt="" width="24" height="24">
              </a>
              <a href="#" class="l-header__nav-social-link" aria-label="LINE">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icon/icon_line.svg' ); ?>" alt="" width="24" height="24">
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <?php if ( is_front_page() ) : ?>
  <aside class="social social--left">
    <div class="social__label">みのり各店</div>
    <a href="<?php echo esc_url( 'https://www.instagram.com/noukanomiseminori/' ); ?>" target="_blank" rel="noopener noreferrer" class="social__link" aria-label="Instagram">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icon/icon_instagram.svg' ); ?>" alt="" width="24" height="24">
    </a>
  </aside>

  <aside class="social social--right">
    <div class="social__label">インターパーク店</div>
    <a href="<?php echo esc_url( 'https://www.instagram.com/minori_kaboku_interpark/' ); ?>" target="_blank" rel="noopener noreferrer" class="social__link" aria-label="Instagram">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icon/icon_instagram.svg' ); ?>" alt="" width="24" height="24">
    </a>
    <a href="<?php echo esc_url( 'https://lin.ee/Ri3brQ9' ); ?>" target="_blank" rel="noopener noreferrer" class="social__link" aria-label="LINE">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icon/icon_line.svg' ); ?>" alt="" width="24" height="24">
    </a>
  </aside>
  <?php endif; ?>

