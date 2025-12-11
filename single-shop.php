<?php
/**
 * 店舗詳細テンプレート（カスタム投稿タイプ shop）
 *
 * @package Minorihp
 */

get_header();
$assets = get_template_directory_uri() . '/assets';
?>

<main class="l-main">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php
    $post_id = get_the_ID();
    // デバッグ用（一時的）
    // echo '<!-- Post ID: ' . $post_id . ', Slug: ' . get_post_field( 'post_name', $post_id ) . ', Title: ' . get_the_title() . ' -->';
    $shop_name        = function_exists( 'get_field' ) ? ( get_field( 'shop_name', $post_id ) ?: get_the_title() ) : get_the_title();
    $shop_image       = function_exists( 'get_field' ) ? get_field( 'shop_image', $post_id ) : '';
    $shop_address     = function_exists( 'get_field' ) ? ( get_field( 'shop_address', $post_id ) ?: '' ) : '';
    $shop_tel         = function_exists( 'get_field' ) ? ( get_field( 'shop_tel', $post_id ) ?: '' ) : '';
    $shop_hours       = function_exists( 'get_field' ) ? ( get_field( 'shop_hours', $post_id ) ?: '' ) : '';
    $shop_map_iframe  = function_exists( 'get_field' ) ? get_field( 'shop_map_iframe', $post_id ) : '';
    $shop_features    = function_exists( 'get_field' ) ? get_field( 'shop_features', $post_id ) : '';
    $shop_feature_img = function_exists( 'get_field' ) ? get_field( 'shop_feature_image', $post_id ) : '';

    $image_url = '';
    if ( is_array( $shop_image ) && isset( $shop_image['url'] ) ) {
      $image_url = $shop_image['url'];
    } elseif ( is_string( $shop_image ) && ! empty( $shop_image ) ) {
      $image_url = $shop_image;
    } else {
      $image_url = $assets . '/img/shop/ni1.jpg';
    }

    $feature_image_url = '';
    if ( is_array( $shop_feature_img ) && isset( $shop_feature_img['url'] ) ) {
      $feature_image_url = $shop_feature_img['url'];
    } elseif ( is_string( $shop_feature_img ) && ! empty( $shop_feature_img ) ) {
      $feature_image_url = $shop_feature_img;
    }

    // マップ埋め込み: 優先 1) iframe入力 2) 住所で自動埋め込み 3) デフォルト
    if ( $shop_map_iframe ) {
      $map_iframe = $shop_map_iframe;
    } elseif ( $shop_address ) {
      $encoded_address = rawurlencode( wp_strip_all_tags( $shop_address ) );
      $map_src = sprintf( 'https://www.google.com/maps?q=%s&z=15&output=embed', $encoded_address );
      $map_iframe = sprintf(
        '<iframe id="shopMap" src="%s" width="100%%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        esc_url( $map_src )
      );
    } else {
      $map_iframe = '<iframe id="shopMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.5!2d140.0!3d36.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzYsNDgsMC4wIE4gMTQwLDAwLDAuMCBF!5e0!3m2!1sja!2sjp!4v1234567890" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
    }
    ?>
    <article class="p-shop-detail">
      <div class="p-shop-detail__inner">
        <div class="p-shop-detail__breadcrumb">
          <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>">店舗一覧</a> &gt; <span id="shopName"><?php echo esc_html( $shop_name ); ?></span>
        </div>

        <header class="p-shop-detail__header">
          <h1 class="p-shop-detail__title" id="shopTitle"><?php echo esc_html( $shop_name ); ?></h1>
          <div class="p-shop-detail__image">
            <img id="shopMainImage" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $shop_name ); ?>">
          </div>
        </header>

        <div class="p-shop-detail__content">
          <section class="p-shop-detail__info">
            <h2 class="p-shop-detail__section-title">店舗情報</h2>
            <dl class="p-shop-detail__info-list">
              <dt>住所</dt>
              <dd id="shopAddress"><?php echo wp_kses_post( $shop_address ?: '住所情報は準備中です。' ); ?></dd>

              <dt>電話番号</dt>
              <dd>
                <?php if ( $shop_tel ) : ?>
                  <a href="tel:<?php echo esc_attr( preg_replace( '/\D+/', '', $shop_tel ) ); ?>" id="shopTel"><?php echo esc_html( $shop_tel ); ?></a>
                <?php else : ?>
                  <span id="shopTel">電話番号は準備中です。</span>
                <?php endif; ?>
              </dd>

              <dt>営業時間</dt>
              <dd id="shopHours"><?php echo wp_kses_post( $shop_hours ?: '営業時間は準備中です。' ); ?></dd>
            </dl>
          </section>

          <section class="p-shop-detail__map">
            <h2 class="p-shop-detail__section-title">地図</h2>
            <div class="p-shop-detail__map-wrapper">
              <?php echo $map_iframe; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
          </section>

          <section class="p-shop-detail__features">
            <h2 class="p-shop-detail__section-title">店舗の特徴</h2>
            <div id="shopFeatures">
              <?php
              if ( $shop_features ) {
                echo wp_kses_post( $shop_features );
              } else {
                ?>
                <p>
                  店舗の詳細情報は現在準備中です。公開までしばらくお待ちください。
                </p>
                <?php
              }
              ?>
            </div>
            <?php if ( $feature_image_url ) : ?>
            <div class="p-shop-detail__features-image">
              <img src="<?php echo esc_url( $feature_image_url ); ?>" alt="<?php echo esc_attr( $shop_name ); ?>">
            </div>
            <?php endif; ?>
          </section>
        </div>

        <div class="p-shop-detail__back">
          <a href="<?php echo esc_url( home_url( '/shop' ) ); ?>" class="c-button">店舗一覧に戻る</a>
        </div>
      </div>
    </article>
    <?php endwhile; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>

