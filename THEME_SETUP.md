# WordPressテーマディレクトリの準備手順

## WordPressのインストール場所の確認

### Local by Flywheelの場合
通常、以下のような場所にインストールされます：
- Mac: `~/Local Sites/サイト名/app/public/`
- Windows: `C:\Users\ユーザー名\Local Sites\サイト名\app\public\`

### テーマディレクトリの場所
```
wp-content/themes/minorihp-theme/
```

## 手順

### 1. テーマディレクトリの作成

WordPressのインストール場所に移動して、テーマディレクトリを作成：

```bash
# Local by Flywheelの場合の例
cd ~/Local\ Sites/サイト名/app/public/wp-content/themes/
mkdir minorihp-theme
cd minorihp-theme
```

### 2. 必要なファイルのコピー

現在のプロジェクトから以下のファイル・フォルダをテーマディレクトリにコピー：

- `assets/` → テーマディレクトリにコピー
- `css/` → テーマディレクトリにコピー
- `js/` → テーマディレクトリにコピー
- `scss/` → テーマディレクトリにコピー
- `package.json` → テーマディレクトリにコピー（SCSSコンパイル用）

### 3. 基本的なWordPressテーマファイルの作成

以下のファイルをテーマディレクトリに作成する必要があります：

1. **style.css** - テーマ情報を含むCSSファイル（必須）
2. **functions.php** - テーマの機能を定義（必須）
3. **index.php** - メインテンプレートファイル（必須）
4. **header.php** - ヘッダー部分
5. **footer.php** - フッター部分

## 次のステップ

テーマディレクトリの準備が完了したら、基本的なテーマファイルを作成します。

