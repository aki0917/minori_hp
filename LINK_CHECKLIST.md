# リンク修正チェックリスト

WordPress化前に修正すべきリンクの一覧です。

## 🔴 必須修正（WordPress化前に修正推奨）

### 1. SNSリンク（Instagram、LINE）
**現在の状態**: `href="#"`（全ページで未設定）

**修正箇所**:
- `index.html`: 43行目、51行目、54行目、575行目、580行目、591行目、596行目
- `news.html`: 275行目、280行目
- `news-detail.html`: 253行目、258行目
- `shop.html`: 193行目、198行目
- `shop-detail.html`: 144行目、149行目
- `about.html`: 294行目、299行目

**修正内容**:
```html
<!-- 修正前 -->
<a href="#" class="social__link" aria-label="Instagram">

<!-- 修正後（Instagram） -->
<a href="https://www.instagram.com/noukanomiseminori/" class="social__link" aria-label="Instagram" target="_blank" rel="noopener noreferrer">

<!-- 修正後（LINE） -->
<a href="https://line.me/R/ti/p/@minori" class="social__link" aria-label="LINE" target="_blank" rel="noopener noreferrer">
```

**注意**: 実際のInstagram/LINEアカウントURLに置き換えてください。

---

### 2. お知らせ詳細ページへのリンク
**現在の状態**: ほとんどのお知らせが`href="#"`になっている

**修正箇所**:
- `index.html`: 111行目、118行目、125行目
- `news.html`: 56行目、63行目、70行目、77行目、84行目、91行目、98行目、105行目、112行目、119行目、126行目、133行目、140行目、147行目

**修正内容**:
```html
<!-- 修正前 -->
<a class="p-news__link" href="#">

<!-- 修正後（各お知らせの詳細ページ） -->
<a class="p-news__link" href="./news-detail.html?id=1">
<!-- または -->
<a class="p-news__link" href="./news-detail.html?slug=winter-hours">
```

**注意**: WordPress化後は自動的にパーマリンクが生成されるため、一時的な対応でOK。

---

### 3. Instagram「もっと見る」ボタン
**現在の状態**: `href="#"`

**修正箇所**:
- `index.html`: 435行目、456行目

**修正内容**:
```html
<!-- 修正前 -->
<a class="c-button" href="#" target="_blank" rel="noopener noreferrer">Instagramでもっと見る</a>

<!-- 修正後（みのり各店） -->
<a class="c-button" href="https://www.instagram.com/noukanomiseminori/" target="_blank" rel="noopener noreferrer">Instagramでもっと見る</a>

<!-- 修正後（インターパーク店） -->
<a class="c-button" href="https://www.instagram.com/interpark_minori/" target="_blank" rel="noopener noreferrer">Instagramでもっと見る</a>
```

**注意**: 実際のInstagramアカウントURLに置き換えてください。

---

## 🟡 推奨修正（WordPress化前後どちらでも可）

### 4. お知らせサイドバーのリンク
**現在の状態**: カテゴリ・アーカイブリンクが`href="#"`

**修正箇所**:
- `news.html`: 164行目、167行目、170行目、186行目、192行目、198行目、204行目、217行目、220行目、223行目、226行目、229行目、232行目
- `news-detail.html`: 142行目、145行目、148行目、164行目、170行目、176行目、182行目、195行目、198行目、201行目、204行目、207行目、210行目

**修正内容**:
```html
<!-- 修正前 -->
<a href="#" class="p-news-sidebar__link">お知らせ</a>

<!-- 修正後（WordPress化前は一時的に） -->
<a href="./news.html?category=news" class="p-news-sidebar__link">お知らせ</a>

<!-- WordPress化後は自動的に生成される -->
<a href="<?php echo get_term_link('news', 'news_category'); ?>" class="p-news-sidebar__link">お知らせ</a>
```

**注意**: WordPress化後は自動的にリンクが生成されるため、優先度は低め。

---

### 5. パスの統一
**現在の状態**: `/about.html` と `./about.html` が混在

**修正箇所**:
- `index.html`: 31行目、550行目
- その他のページでも同様の不統一がある可能性

**修正内容**:
```html
<!-- 統一ルール: 同じディレクトリ内は `./` を使用 -->
<a href="./about.html" class="l-header__nav-link">会社概要</a>

<!-- ルートディレクトリは `/` を使用 -->
<a href="/" class="l-header__nav-link">トップ</a>
```

**注意**: WordPress化後は`<?php echo get_permalink(); ?>`を使用するため、一時的な対応でOK。

---

## 🟢 WordPress化後に自動修正される項目

以下の項目は、WordPress化後に自動的に正しいリンクが生成されるため、現時点での修正は不要です：

1. **ナビゲーションメニュー**: `wp_nav_menu()`で自動生成
2. **パンくずリスト**: WordPressのパンくずリストプラグインで自動生成
3. **お知らせの詳細リンク**: パーマリンクで自動生成
4. **店舗詳細リンク**: カスタム投稿タイプのパーマリンクで自動生成

---

## 修正優先度

### 高優先度（WordPress化前に修正）
1. ✅ SNSリンク（Instagram、LINE）
2. ✅ Instagram「もっと見る」ボタン
3. ✅ お知らせ詳細ページへのリンク（最低限、動作確認用）

### 中優先度（WordPress化前後どちらでも可）
4. お知らせサイドバーのリンク
5. パスの統一

### 低優先度（WordPress化後に自動修正）
6. ナビゲーションメニュー
7. パンくずリスト
8. その他の動的リンク

---

## 修正手順

### ステップ1: SNSリンクの修正
1. InstagramアカウントURLを確認
2. LINEアカウントURLを確認
3. 全ページのSNSリンクを一括置換

### ステップ2: お知らせリンクの修正
1. 各お知らせの詳細ページを作成（または`news-detail.html`にクエリパラメータで対応）
2. リンクを更新

### ステップ3: Instagram「もっと見る」ボタンの修正
1. InstagramアカウントURLを確認
2. リンクを更新

### ステップ4: 動作確認
1. すべてのリンクをクリックして動作確認
2. 外部リンクが正しく開くことを確認
3. 内部リンクが正しく遷移することを確認

---

## 注意事項

1. **外部リンク**: `target="_blank"`と`rel="noopener noreferrer"`を必ず追加
2. **相対パス vs 絶対パス**: 同じディレクトリ内は`./`を使用、ルートは`/`を使用
3. **WordPress化後の変更**: WordPress化後は、多くのリンクが動的に生成されるため、再度確認が必要

---

## 修正後の確認項目

- [ ] すべてのSNSリンクが正しく動作する
- [ ] お知らせ詳細ページへのリンクが正しく動作する
- [ ] Instagram「もっと見る」ボタンが正しく動作する
- [ ] 外部リンクに`target="_blank"`と`rel="noopener noreferrer"`が設定されている
- [ ] パスが統一されている（相対パスのルールが統一されている）

---

**作成日**: 2025年1月
**最終更新**: 2025年1月

