<?php
/**
 * 投稿一覧テンプレート
 *
 * @package Minorihp
 */

get_header();
?>

<main class="l-main">
  <section class="p-news">
    <div class="p-news__inner">
      <div class="p-news__container">
        <div class="p-news__main">
          <h2 class="p-news__title c-sec-title">お知らせ</h2>
          <?php
          // お知らせ（news カスタム投稿）のアーカイブ専用クエリ
          $paged      = max( 1, get_query_var( 'paged' ) );
          $news_query = new WP_Query(
            array(
              'post_type'      => 'news',
              'posts_per_page' => get_query_var( 'posts_per_page' ),
              'paged'          => $paged,
              'orderby'        => 'date',
              'order'          => 'DESC',
            )
          );
          ?>
          <?php if ( $news_query->have_posts() ) : ?>
            <ul class="p-news__list">
              <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
              <li class="p-news__item">
                <a class="p-news__link" href="<?php the_permalink(); ?>">
                  <time class="p-news__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
                  <?php
                  $categories = get_the_category();
                  $cat_name   = ! empty( $categories ) ? $categories[0]->name : 'お知らせ';
                  ?>
                  <span class="p-news__cat"><?php echo esc_html( $cat_name ); ?></span>
                  <span class="p-news__text"><?php the_title(); ?></span>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <div class="p-news__pagination">
              <?php
              the_posts_pagination(
                array(
                  'mid_size'  => 1,
                  'prev_text' => '前へ',
                  'next_text' => '次へ',
                )
              );
              ?>
            </div>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <p class="p-news__empty">現在、お知らせはありません。</p>
          <?php endif; ?>
        </div>

        <aside class="p-news__sidebar">
          <div class="p-news-sidebar">
            <div class="p-news-sidebar__widget">
              <h3 class="p-news-sidebar__title">最新記事</h3>
              <ul class="p-news-sidebar__list">
                <?php
                $recent_posts = wp_get_recent_posts(
                  array(
                    'numberposts' => 5,
                    'post_status' => 'publish',
                    'post_type'   => 'news',
                  )
                );
                if ( ! empty( $recent_posts ) ) :
                  foreach ( $recent_posts as $recent ) :
                ?>
                  <li class="p-news-sidebar__item">
                    <a href="<?php echo esc_url( get_permalink( $recent['ID'] ) ); ?>" class="p-news-sidebar__link">
                      <time class="p-news-sidebar__date" datetime="<?php echo esc_attr( get_the_date( 'c', $recent['ID'] ) ); ?>">
                        <?php echo esc_html( get_the_date( 'Y.m.d', $recent['ID'] ) ); ?>
                      </time>
                      <span class="p-news-sidebar__text"><?php echo esc_html( get_the_title( $recent['ID'] ) ); ?></span>
                    </a>
                  </li>
                <?php
                  endforeach;
                else :
                ?>
                  <li class="p-news-sidebar__item">まだ記事がありません。</li>
                <?php endif; ?>
              </ul>
            </div>

            <div class="p-news-sidebar__widget">
              <h3 class="p-news-sidebar__title">アーカイブ</h3>
              <ul class="p-news-sidebar__list">
                <?php
                $archives = wp_get_archives(
                  array(
                    'type'      => 'monthly',
                    'limit'     => 6,
                    'echo'      => false,
                    'format'    => 'custom',
                    'before'    => '<li class="p-news-sidebar__item">',
                    'after'     => '</li>',
                    'post_type' => 'news',
                  )
                );
                echo wp_kses_post( $archives );
                ?>
              </ul>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
