# WordPress化 準備ガイド

このドキュメントは、現在の静的HTMLサイトをWordPressに移行するための準備事項をまとめています。

## 📋 目次

1. [データ構造の整理](#データ構造の整理)
2. [WordPressテーマ構造](#wordpressテーマ構造)
3. [カスタム投稿タイプ・カスタムフィールド](#カスタム投稿タイプカスタムフィールド)
4. [テンプレートファイルの設計](#テンプレートファイルの設計)
5. [アセットの移行](#アセットの移行)
6. [JavaScript/アニメーションの統合](#javascriptアニメーションの統合)
7. [必要なプラグイン](#必要なプラグイン)
8. [パーマリンク構造](#パーマリンク構造)
9. [データ移行計画](#データ移行計画)
10. [開発環境の準備](#開発環境の準備)

---

## データ構造の整理

### 1. 店舗情報（現在：`js/shop-detail.js`）

**現在の構造：**
- JavaScriptオブジェクトとして9店舗の情報を管理
- 各店舗に以下の情報：
  - `name`: 店舗名
  - `image`: メイン画像パス
  - `address`: 住所（HTML可）
  - `tel`: 電話番号
  - `hours`: 営業時間（HTML可）
  - `access`: アクセス情報
  - `mapUrl`: Google Maps埋め込みURL
  - `features`: 店舗の特徴（HTML可）

**WordPress化後の構造：**
- **カスタム投稿タイプ**: `shop`（店舗）
- **カスタムフィールド**（ACF推奨）:
  - `shop_image`: メイン画像
  - `shop_address`: 住所
  - `shop_tel`: 電話番号
  - `shop_hours`: 営業時間
  - `shop_access`: アクセス情報
  - `shop_map_url`: Google Maps埋め込みURL
  - `shop_features`: 店舗の特徴（WYSIWYGエディタ）

### 2. お知らせ情報（現在：`news.html`）

**現在の構造：**
- 静的HTMLで15件のニュースをハードコーディング
- 各ニュースに以下の情報：
  - 日付（`datetime`属性）
  - カテゴリ（お知らせ/イベント/採用）
  - タイトル
  - リンク先

**WordPress化後の構造：**
- **標準投稿タイプ**: `post`（お知らせ）
- **カスタムタクソノミー**: `news_category`（お知らせ/イベント/採用）
- または標準のカテゴリ機能を使用

### 3. オリジナル商品（現在：`index.html`内）

**現在の構造：**
- 5つの商品を静的HTMLで表示
- 各商品に以下の情報：
  - 画像
  - タイトル
  - サブタイトル
  - 説明文
  - CTAリンク

**WordPress化後の構造：**
- **カスタム投稿タイプ**: `product`（オリジナル商品）
- **カスタムフィールド**:
  - `product_image`: 商品画像
  - `product_subtitle`: サブタイトル
  - `product_description`: 説明文
  - `product_cta_url`: CTAリンク先

### 4. サービス事業（現在：`index.html`内）

**現在の構造：**
- 7つのサービスをモーダルで表示
- 各サービスに以下の情報：
  - タイトル
  - 画像
  - 説明文（HTML可）

**WordPress化後の構造：**
- **カスタム投稿タイプ**: `service`（サービス事業）
- **カスタムフィールド**:
  - `service_image`: サービス画像
  - `service_description`: 説明文（WYSIWYGエディタ）

### 5. 会社概要ページ（現在：`about.html`）

**現在の構造：**
- 静的HTMLで複数のセクション：
  - 企業理念（画像ギャラリー）
  - 沿革（タイムライン）
  - 超スローフード宣言
  - 会社情報

**WordPress化後の構造：**
- **固定ページ**: `about`（会社概要）
- **カスタムフィールド**（セクションごと）:
  - `about_philosophy_images`: 企業理念画像（リピーターフィールド）
  - `about_history`: 沿革（リピーターフィールド）
  - `about_message`: 超スローフード宣言テキスト
  - `about_info`: 会社情報

---

## WordPressテーマ構造

### 推奨ディレクトリ構造

```
wp-content/themes/minori-theme/
├── style.css                    # テーマ情報
├── functions.php                # テーマ機能
├── index.php                    # メインテンプレート
├── header.php                   # ヘッダー
├── footer.php                   # フッター
├── single.php                   # 投稿詳細
├── page.php                     # 固定ページ
├── archive.php                   # アーカイブ
├── template-parts/              # テンプレートパーツ
│   ├── hero.php
│   ├── news-list.php
│   ├── items.php
│   ├── originals.php
│   ├── services.php
│   └── ...
├── assets/                      # アセット
│   ├── css/
│   │   └── style.css           # コンパイル済みCSS
│   ├── js/
│   │   ├── main.js
│   │   ├── shop-detail.js
│   │   └── about-text-animations.js
│   ├── img/                    # 画像（既存のassets/imgを移行）
│   └── icon/                   # アイコン（既存のassets/iconを移行）
├── scss/                       # SCSSソース（開発用）
│   ├── style.scss
│   ├── foundation/
│   ├── layout/
│   └── object/
└── inc/                        # PHP関数
    ├── post-types.php          # カスタム投稿タイプ
    ├── taxonomies.php          # カスタムタクソノミー
    ├── acf-fields.php          # ACFフィールド定義（オプション）
    └── enqueue-scripts.php     # スクリプト・スタイルの読み込み
```

---

## カスタム投稿タイプ・カスタムフィールド

### 1. カスタム投稿タイプ

#### `shop`（店舗）
```php
// inc/post-types.php
register_post_type('shop', [
    'labels' => [
        'name' => '店舗',
        'singular_name' => '店舗',
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'shop'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-store',
]);
```

#### `product`（オリジナル商品）
```php
register_post_type('product', [
    'labels' => [
        'name' => 'オリジナル商品',
        'singular_name' => 'オリジナル商品',
    ],
    'public' => true,
    'has_archive' => false,
    'rewrite' => ['slug' => 'originals'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-products',
]);
```

#### `service`（サービス事業）
```php
register_post_type('service', [
    'labels' => [
        'name' => 'サービス事業',
        'singular_name' => 'サービス事業',
    ],
    'public' => true,
    'has_archive' => false,
    'rewrite' => ['slug' => 'services'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-admin-tools',
]);
```

### 2. カスタムフィールド（ACF推奨）

#### 店舗（`shop`）のカスタムフィールド
- `shop_address`: テキストエリア
- `shop_tel`: テキスト
- `shop_hours`: テキストエリア（HTML可）
- `shop_access`: テキスト
- `shop_map_url`: URL
- `shop_features`: WYSIWYGエディタ

#### オリジナル商品（`product`）のカスタムフィールド
- `product_subtitle`: テキスト
- `product_description`: テキストエリア
- `product_cta_url`: URL

#### サービス事業（`service`）のカスタムフィールド
- `service_description`: WYSIWYGエディタ

### 3. カスタムタクソノミー

#### お知らせカテゴリ（`news_category`）
```php
// inc/taxonomies.php
register_taxonomy('news_category', 'post', [
    'labels' => [
        'name' => 'お知らせカテゴリ',
        'singular_name' => 'お知らせカテゴリ',
    ],
    'public' => true,
    'hierarchical' => false,
    'rewrite' => ['slug' => 'news-category'],
]);
```

---

## テンプレートファイルの設計

### 1. フロントページ（`front-page.php`）

現在の`index.html`をベースに：
- ヒーローセクション
- 会社紹介セクション
- お知らせセクション（最新5件）
- 6つの特徴セクション
- オリジナル商品セクション（`product`投稿タイプから取得）
- サービス事業セクション（`service`投稿タイプから取得）
- 各種お取引について
- よくある質問
- Instagramセクション
- ファーマーズカード

### 2. 店舗一覧（`archive-shop.php`）

現在の`shop.html`をベースに：
- 9店舗をループで表示
- 各店舗カードに画像、店舗名、住所を表示

### 3. 店舗詳細（`single-shop.php`）

現在の`shop-detail.html`をベースに：
- カスタムフィールドから情報を取得して表示
- Google Maps埋め込み

### 4. お知らせ一覧（`archive.php` または `archive-post.php`）

現在の`news.html`をベースに：
- 投稿をループで表示
- カテゴリ別フィルタリング（オプション）
- ページネーション

### 5. お知らせ詳細（`single.php`）

現在の`news-detail.html`をベースに：
- 投稿内容を表示
- パンくずリスト
- 関連記事

### 6. 会社概要（`page-about.php`）

現在の`about.html`をベースに：
- カスタムフィールドから情報を取得
- 企業理念セクション
- 沿革セクション（リピーターフィールド）
- 超スローフード宣言セクション

---

## アセットの移行

### 1. 画像ファイル

**移行先：**
```
wp-content/themes/minori-theme/assets/img/
├── about/
├── common/
├── hero/
├── products/
├── services/
├── shop/
└── top/
```

**注意点：**
- WordPressメディアライブラリにアップロードするか、テーマフォルダに直接配置するか検討
- メディアライブラリを使用する場合、`wp_get_attachment_image()`を使用

### 2. アイコンファイル

**移行先：**
```
wp-content/themes/minori-theme/assets/icon/
```

### 3. CSS/SCSSファイル

**移行先：**
- SCSSソース: `wp-content/themes/minori-theme/scss/`
- コンパイル済みCSS: `wp-content/themes/minori-theme/assets/css/`

**functions.phpでの読み込み：**
```php
wp_enqueue_style('minori-theme-style', get_template_directory_uri() . '/assets/css/style.css', [], '1.0.0');
```

### 4. JavaScriptファイル

**移行先：**
```
wp-content/themes/minori-theme/assets/js/
```

**functions.phpでの読み込み：**
```php
wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', [], '3.12.5', true);
wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', ['gsap'], '3.12.5', true);
wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11', true);
wp_enqueue_script('minori-main', get_template_directory_uri() . '/assets/js/main.js', ['gsap', 'gsap-scrolltrigger'], '1.0.0', true);
```

---

## JavaScript/アニメーションの統合

### 1. GSAPアニメーション

現在の`js/main.js`はそのまま使用可能ですが、以下の点を確認：

- **WordPressのjQuery互換性**: GSAPはjQueryに依存しないため問題なし
- **ScrollTriggerの初期化**: `wp_enqueue_script`で正しい順序で読み込む
- **DOM要素の取得**: WordPressのテンプレートタグを使用する場合、クラス名が変わらないか確認

### 2. 店舗詳細ページのJavaScript

現在の`js/shop-detail.js`は、WordPress化後は以下のように変更：

**変更前（静的HTML）：**
```javascript
const shopData = { /* ... */ };
const shopId = getShopIdFromUrl();
const shop = shopData[shopId];
```

**変更後（WordPress）：**
```javascript
// PHPからデータを渡す方法
const shopData = <?php echo json_encode($shop_data); ?>;
// または、REST APIを使用
fetch('/wp-json/wp/v2/shop/' + shopId)
  .then(response => response.json())
  .then(data => { /* ... */ });
```

### 3. Instagram埋め込み

現在の埋め込みコードはそのまま使用可能ですが、動的に取得する場合は：

- **Instagram Graph API**を使用
- **プラグイン**を使用（例：Instagram Feed）
- **カスタムフィールド**で投稿URLを管理

---

## 必要なプラグイン

### 必須プラグイン

1. **Advanced Custom Fields (ACF)**
   - カスタムフィールドの管理
   - リピーターフィールド、WYSIWYGエディタなど

2. **Custom Post Type UI**（オプション）
   - カスタム投稿タイプの管理
   - または`functions.php`で直接定義

### 推奨プラグイン

1. **Yoast SEO** または **All in One SEO Pack**
   - SEO最適化

2. **WP Super Cache** または **W3 Total Cache**
   - パフォーマンス最適化

3. **Contact Form 7** または **WPForms**
   - お問い合わせフォーム（必要に応じて）

4. **WordPress Importer**
   - データ移行時に使用

### オプションプラグイン

1. **Instagram Feed**
   - Instagram投稿の表示

2. **Google Maps Embed**
   - Google Mapsの管理

---

## パーマリンク構造

### 推奨設定

```
/%postname%/
```

### カスタム投稿タイプのURL

- 店舗一覧: `/shop/`
- 店舗詳細: `/shop/nishinasuno/`
- お知らせ一覧: `/news/` または `/`
- お知らせ詳細: `/news/post-slug/`
- オリジナル商品: `/originals/product-slug/`
- サービス事業: `/services/service-slug/`

### 固定ページのURL

- トップページ: `/`
- 会社概要: `/about/`
- 店舗一覧: `/shop/`
- お知らせ: `/news/`

---

## データ移行計画

### 1. 店舗情報の移行

**手順：**
1. `js/shop-detail.js`の`shopData`オブジェクトをCSVにエクスポート
2. WordPress管理画面で`shop`投稿タイプを作成
3. 各店舗の情報を手動で入力、またはインポートツールを使用

**CSV形式例：**
```csv
name,slug,image,address,tel,hours,access,map_url,features
西那須野店,nishinasuno,./assets/img/shop/ni1.jpg,〒325-0062<br>栃木県...,0287-36-1111,平日：9:00 ～ 18:00...,JR那須塩原駅より車で約10分,https://www.google.com/maps/embed?...,西那須野店は、1992年4月にオープン...
```

### 2. お知らせの移行

**手順：**
1. `news.html`からお知らせ情報を抽出
2. WordPressの投稿として作成
3. カテゴリを設定（お知らせ/イベント/採用）

### 3. オリジナル商品の移行

**手順：**
1. `index.html`から商品情報を抽出
2. `product`投稿タイプとして作成
3. カスタムフィールドを設定

### 4. サービス事業の移行

**手順：**
1. `index.html`からサービス情報を抽出
2. `service`投稿タイプとして作成
3. カスタムフィールドを設定

### 5. 会社概要ページの移行

**手順：**
1. `about.html`の内容を固定ページとして作成
2. カスタムフィールドで各セクションの情報を設定

---

## 開発環境の準備

### 1. ローカル開発環境

**推奨ツール：**
- **Local by Flywheel**
- **MAMP / XAMPP**
- **Docker**（上級者向け）

### 2. WordPressのインストール

1. WordPress最新版をダウンロード
2. データベースを作成
3. `wp-config.php`を設定
4. テーマフォルダを作成

### 3. テーマのセットアップ

1. 既存のSCSS/CSS/JSファイルをテーマフォルダにコピー
2. `style.css`にテーマ情報を記述
3. `functions.php`を作成
4. `header.php`と`footer.php`を作成

### 4. 開発フロー

1. **ローカル環境で開発**
   - テーマファイルの作成
   - カスタム投稿タイプ・フィールドの設定
   - テンプレートの実装

2. **データの移行**
   - 既存データをWordPressに移行
   - 画像のアップロード

3. **テスト**
   - 各ページの表示確認
   - アニメーションの動作確認
   - レスポンシブデザインの確認

4. **本番環境へのデプロイ**
   - テーマファイルのアップロード
   - データベースの移行
   - パーマリンクの設定

---

## チェックリスト

### 移行前の準備

- [ ] 現在のサイトのバックアップを取得
- [ ] データ構造の整理（店舗、お知らせ、商品など）
- [ ] 画像ファイルの整理
- [ ] カスタム投稿タイプの設計
- [ ] カスタムフィールドの設計

### テーマ開発

- [ ] テーマフォルダの作成
- [ ] `style.css`の作成（テーマ情報）
- [ ] `functions.php`の作成
- [ ] `header.php`の作成
- [ ] `footer.php`の作成
- [ ] テンプレートファイルの作成
- [ ] カスタム投稿タイプの登録
- [ ] カスタムフィールドの設定（ACF）

### データ移行

- [ ] 店舗情報の移行
- [ ] お知らせの移行
- [ ] オリジナル商品の移行
- [ ] サービス事業の移行
- [ ] 会社概要ページの移行
- [ ] 画像のアップロード

### テスト

- [ ] フロントページの表示確認
- [ ] 店舗一覧・詳細ページの表示確認
- [ ] お知らせ一覧・詳細ページの表示確認
- [ ] 会社概要ページの表示確認
- [ ] アニメーションの動作確認
- [ ] レスポンシブデザインの確認
- [ ] パフォーマンステスト

### 本番環境へのデプロイ

- [ ] 本番環境のWordPressインストール
- [ ] テーマファイルのアップロード
- [ ] プラグインのインストール
- [ ] データベースの移行
- [ ] パーマリンクの設定
- [ ] 画像パスの確認
- [ ] 最終テスト

---

## 注意事項

### 1. パスの変更

静的HTMLからWordPressに移行する際、以下のパスが変更されます：

- **画像パス**: `./assets/img/` → `<?php echo get_template_directory_uri(); ?>/assets/img/`
- **CSS/JSパス**: `css/style.css` → `<?php echo get_template_directory_uri(); ?>/assets/css/style.css`

### 2. テンプレートタグの使用

WordPressのテンプレートタグを使用：
- `<?php get_header(); ?>`
- `<?php get_footer(); ?>`
- `<?php the_title(); ?>`
- `<?php the_content(); ?>`
- `<?php wp_nav_menu(); ?>`

### 3. ループの実装

投稿を表示する際はWordPressのループを使用：
```php
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- 投稿内容 -->
    <?php endwhile; ?>
<?php endif; ?>
```

### 4. セキュリティ

- **エスケープ処理**: `esc_html()`, `esc_url()`, `esc_attr()`を使用
- **nonce**: フォーム送信時に使用
- **権限チェック**: 管理画面機能で使用

### 5. パフォーマンス

- **画像最適化**: WebP形式の使用を検討
- **キャッシュ**: プラグインを使用
- **CDN**: 静的アセットの配信を検討

---

## 参考リソース

- [WordPress Codex](https://codex.wordpress.org/)
- [Advanced Custom Fields ドキュメント](https://www.advancedcustomfields.com/resources/)
- [GSAP ドキュメント](https://greensock.com/docs/)
- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)

---

## 次のステップ

1. **開発環境のセットアップ**
2. **テーマの基本構造の作成**
3. **カスタム投稿タイプ・フィールドの実装**
4. **テンプレートファイルの実装**
5. **データの移行**
6. **テストとデバッグ**
7. **本番環境へのデプロイ**

---

**作成日**: 2025年1月
**最終更新**: 2025年1月

