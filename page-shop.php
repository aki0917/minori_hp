<?php
/**
 * Template Name: 店舗一覧
 *
 * @package Minorihp
 */

get_header();
$assets = get_template_directory_uri() . '/assets';

$shops = array(
  array(
    'slug'    => 'nishinasuno',
    'name'    => '西那須野店',
    'address' => '〒329-2745<br>栃木県那須塩原市三区町510-2',
    'tel'     => '0287-36-7043',
    'image'   => 'ni1.jpg',
  ),
  array(
    'slug'    => 'ishibashi',
    'name'    => '石橋店',
    'address' => '〒329-0431<br>栃木県下野市薬師寺祇園原3379-3',
    'tel'     => '0285-44-3831',
    'image'   => 'isi1.jpg',
  ),
  array(
    'slug'    => 'moka',
    'name'    => '真岡店',
    'address' => '〒321-4304<br>栃木県真岡市東郷20-2',
    'tel'     => '0285-83-9696',
    'image'   => 'mo1.jpg',
  ),
  array(
    'slug'    => 'ootawara',
    'name'    => '大田原店',
    'address' => '〒324-0047<br>栃木県大田原市美原1-3138-2',
    'tel'     => '0287-23-3335',
    'image'   => 'oo1.jpg',
  ),
  array(
    'slug'    => 'ujiie',
    'name'    => '氏家店',
    'address' => '〒329-1312<br>栃木県さくら市桜野1141-2',
    'tel'     => '028-681-1911',
    'image'   => 'u1.jpg',
  ),
  array(
    'slug'    => 'kanuma',
    'name'    => '鹿沼店',
    'address' => '〒322-0015<br>栃木県鹿沼市上石川1457-1',
    'tel'     => '0289-76-4445',
    'image'   => 'ka1.jpg',
  ),
  array(
    'slug'    => 'kyouwa',
    'name'    => '協和店',
    'address' => '〒309-1106<br>茨城県筑西市新治1996-123',
    'tel'     => '0296-21-7788',
    'image'   => 'kyo1.jpg',
  ),
  array(
    'slug'    => 'ichikai',
    'name'    => '市貝店',
    'address' => '〒321-3426<br>栃木県芳賀郡市貝町赤羽3589-2',
    'tel'     => '0285-67-4141',
    'image'   => 'iti1.jpg',
  ),
  array(
    'slug'    => 'interpark',
    'name'    => 'みのり花木センター<br>インターパーク店',
    'address' => '〒321-0918<br>栃木県宇都宮市平塚町307-1',
    'tel'     => '028-656-7193',
    'image'   => 'IP1.jpg',
  ),
);
?>

<main class="l-main">
  <?php while ( have_posts() ) : the_post(); ?>
  <section class="p-shop">
    <div class="p-shop__inner">
      <h2 class="p-shop__title c-sec-title"><?php the_title(); ?></h2>
      <p class="p-shop__description">
        栃木県・茨城県に9店舗を展開しています。お近くの店舗をご利用ください。
      </p>
      <ul class="p-shop__list">
        <?php 
        // 実際のCPT投稿を取得
        $shop_posts = get_posts( array(
          'post_type'      => 'shop',
          'posts_per_page' => -1,
          'post_status'    => 'publish',
        ) );
        
        // スラッグをキーにした配列を作成
        $shop_posts_by_slug = array();
        foreach ( $shop_posts as $post ) {
          $shop_posts_by_slug[ $post->post_name ] = $post;
        }
        
        foreach ( $shops as $shop ) :
          // 実際の投稿があればそのパーマリンクを使用、なければ固定リンク
          if ( isset( $shop_posts_by_slug[ $shop['slug'] ] ) ) {
            $detail_link = get_permalink( $shop_posts_by_slug[ $shop['slug'] ]->ID );
          } else {
            $detail_link = home_url( '/shop/' . $shop['slug'] . '/' );
          }
        ?>
        <li class="p-shop__item">
          <a href="<?php echo esc_url( $detail_link ); ?>" class="p-shop__card">
            <div class="p-shop__image-wrapper">
              <img src="<?php echo esc_url( $assets . '/img/shop/' . $shop['image'] ); ?>" alt="<?php echo esc_attr( $shop['name'] ); ?>" class="p-shop__image">
            </div>
            <div class="p-shop__content">
              <h3 class="p-shop__name"><?php echo wp_kses_post( $shop['name'] ); ?></h3>
              <p class="p-shop__address"><?php echo wp_kses_post( $shop['address'] ); ?></p>
              <p class="p-shop__tel">TEL: <span><?php echo esc_html( $shop['tel'] ); ?></span></p>
            </div>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>

