# WordPress化 セットアップガイド

## 最初にやること

### 1. ローカル環境のセットアップ

#### オプションA: Local by Flywheel（推奨・初心者向け）
- **ダウンロード**: https://localwp.com/
- **特徴**: 
  - GUIで簡単にセットアップ可能
  - WordPressが自動インストールされる
  - SSL証明書も自動設定
  - データベース管理が簡単

#### オプションB: MAMP（Mac向け）
- **ダウンロード**: https://www.mamp.info/
- **特徴**:
  - Apache + MySQL + PHPがセットアップされる
  - 手動でWordPressをインストールする必要あり

#### オプションC: Docker（上級者向け）
- **特徴**:
  - 環境をコードで管理できる
  - チーム開発に適している

### 2. WordPressのダウンロードとインストール

1. **WordPressのダウンロード**
   - https://ja.wordpress.org/download/ から最新版をダウンロード
   - または、Local by Flywheelを使用する場合は自動インストール

2. **データベースの作成**
   - データベース名: `minorihp_wp`（任意）
   - ユーザー名: `admin`（MAMPの場合）
   - パスワード: `admin`（MAMPの場合、または空）
   - ホスト: `localhost`（または`127.0.0.1`）

3. **WordPressのインストール**
   - WordPressファイルを解凍
   - ローカルサーバーのドキュメントルートに配置
     - MAMP: `/Applications/MAMP/htdocs/minorihp/`
     - Local: 自動で設定される
   - `wp-config.php`を作成（WordPressのインストール画面で自動生成される）

### 3. テーマディレクトリの準備

WordPressインストール後、以下のディレクトリ構造を作成：

```
wordpress/
├── wp-content/
│   └── themes/
│       └── minorihp-theme/  ← ここに現在のHTMLを変換
│           ├── style.css
│           ├── functions.php
│           ├── index.php
│           ├── header.php
│           ├── footer.php
│           ├── assets/      ← 現在のassetsフォルダをコピー
│           ├── css/         ← 現在のcssフォルダをコピー
│           ├── js/          ← 現在のjsフォルダをコピー
│           └── scss/        ← 現在のscssフォルダをコピー
```

### 4. 必要なファイルの確認

現在のプロジェクトからWordPressテーマに必要なファイル：

- ✅ HTMLファイル（index.html, about.html, news.html, shop.html等）
- ✅ CSS/SCSSファイル
- ✅ JavaScriptファイル
- ✅ 画像・アイコンなどのアセット
- ✅ package.json（SCSSコンパイル用）

### 5. 次のステップ（環境構築後）

1. **テーマファイルの作成**
   - `style.css`（テーマ情報を含む）
   - `functions.php`（テーマ機能の定義）
   - `header.php`（ヘッダー部分）
   - `footer.php`（フッター部分）
   - `index.php`（メインテンプレート）

2. **HTMLの分割**
   - 共通部分（header, footer）を分離
   - ページテンプレートの作成

3. **WordPress関数への置き換え**
   - 静的リンクを`<?php bloginfo('url'); ?>`などに置換
   - メタタグを動的生成に変更
   - ナビゲーションメニューを`wp_nav_menu()`に置換

## 推奨される作業順序

1. ✅ ローカル環境のセットアップ（Local by Flywheel推奨）
2. ✅ WordPressのインストール
3. ✅ テーマディレクトリの作成
4. ✅ 現在のファイルをテーマディレクトリにコピー
5. ✅ 基本的なテーマファイル（style.css, functions.php等）の作成
6. ✅ HTMLの分割とテンプレート化

## ローカル環境でのメール設定

### Local by Flywheelの場合（推奨）

Local by Flywheelには**MailHog**というメールキャプチャツールが組み込まれています。

#### 1. MailHogの有効化

1. Localアプリでサイトを選択
2. 「Open Site Shell」をクリック（またはターミナルでサイトのディレクトリに移動）
3. 以下のコマンドでMailHogを起動：
   ```bash
   mailhog
   ```
   - または、Localの「Open MailHog」ボタンを使用

#### 2. MailHogのアクセス

- **Web UI**: http://localhost:8025
- ここで送信されたメールを確認できます
- メールは実際には送信されず、MailHogにキャプチャされます

#### 3. WordPressでのメール送信テスト

WordPressから送信されるメール（パスワードリセット、お問い合わせフォームなど）はすべてMailHogで確認できます。

### その他の方法

#### オプションA: WP Mail SMTP プラグイン

1. WordPress管理画面で「WP Mail SMTP」プラグインをインストール
2. Gmail、SendGrid、MailgunなどのSMTPサービスを設定
3. 実際のメール送信が可能（本番環境と同じ設定）

#### オプションB: functions.phpでメールをログに記録

開発中はメールをファイルに保存して確認：

```php
// functions.phpに追加
add_action('phpmailer_init', function($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = 'localhost';
    $phpmailer->Port = 1025; // MailHogのポート
    $phpmailer->SMTPAuth = false;
});
```

### 本番環境への移行時

本番環境では、以下のいずれかを設定：

1. **サーバーのメール機能を使用**（最も簡単）
2. **SMTPプラグインを使用**（Gmail、SendGrid、Mailgunなど）
3. **メール送信サービスを使用**（SendGrid、Mailgun、Amazon SESなど）

## 注意事項

- 現在の静的サイトはバックアップを取っておくこと
- Gitで管理している場合は、WordPress化用のブランチを作成すること
- 段階的に移行し、動作確認をしながら進めること
- ローカル環境ではMailHogでメールを確認し、本番環境では適切なメール送信設定を行うこと

