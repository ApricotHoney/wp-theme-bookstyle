# WordPress テーマ検証環境

このフォルダには、PHP 8.2.22 環境でWordPressテーマを検証するためのDocker環境が含まれています。

## 環境構成

- WordPress: 6.4
- PHP: 8.2.22
- MySQL: 8.0
- ポート: 8080（http://localhost:8080 でアクセス可能）

## 使用方法

### 環境の起動

```bash
cd infra
./start.sh
```

起動後、http://localhost:8080 にアクセスしてWordPressの初期設定を行ってください。
管理画面は http://localhost:8080/wp-admin/ からアクセスできます。

### 環境の停止

```bash
cd infra
./stop.sh
```

### 環境のリセット（データベースも削除）

```bash
cd infra
./reset.sh
```

## テーマの修正箇所

PHP 7.3.33から8.2.22へのアップグレードに伴い、以下の修正が必要です：

### 1. `get_bloginfo('template_url')` の使用

**修正箇所**: `/themes/bookstyle2015/header.php` の21行目と23行目

```php
// 修正前
<?php wp_enqueue_script('html5shiv', get_bloginfo('template_url') . '/common/js/html5shiv.min.js', array('jquery')); ?>
<?php wp_enqueue_script('selectivizr', get_bloginfo('template_url') . '/common/js/selectivizr.js', array('jquery')); ?>

// 修正後
<?php wp_enqueue_script('html5shiv', get_template_directory_uri() . '/common/js/html5shiv.min.js', array('jquery')); ?>
<?php wp_enqueue_script('selectivizr', get_template_directory_uri() . '/common/js/selectivizr.js', array('jquery')); ?>
```

### 2. `get_eye_url()` 関数の使用方法

**修正箇所**:
- `/themes/bookstyle2015/index.php` の79行目
- `/themes/bookstyle2015/gallery.php` の37行目

```php
// 修正前
<a href="<?php get_eye_url(); ?>" rel="lightbox[bookcover]"><?php the_post_thumbnail('bookcover-thumbnail'); ?></a>

// 修正後
<a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" rel="lightbox[bookcover]"><?php the_post_thumbnail('bookcover-thumbnail'); ?></a>
```

**functions.php** の `get_eye_url()` 関数も修正:

```php
// 修正前
function get_eye_url() {
  $image_id = get_post_thumbnail_id();
  $image_url = wp_get_attachment_image_src(
  $image_id,'large', true);
  echo $image_url [0];
}

// 修正後
function get_eye_url() {
  $image_id = get_post_thumbnail_id();
  $image_url = wp_get_attachment_image_src(
  $image_id,'large', true);
  if (is_array($image_url) && isset($image_url[0])) {
    echo esc_url($image_url[0]);
  }
}
```

### 3. `get_site_url()` の使用方法

**修正箇所**:
- `/themes/bookstyle2015/gallery.php` の18行目
- `/themes/bookstyle2015/header.php` の71行目

```php
// 修正前
<a href="<?php get_site_url(); ?>/photo-form">募集はこちらから！</a>

// 修正後
<a href="<?php echo esc_url(get_site_url()); ?>/photo-form">募集はこちらから！</a>
```

### 4. `remove_filter('the_content', 'wpautop')` の使用方法

**修正箇所**:
- `/themes/bookstyle2015/gallery.php` の5行目
- `/themes/bookstyle2015/header.php` の94行目

```php
// 修正前
<?php remove_filter('the_content', 'wpautop'); ?>

// 修正後
<?php 
// フィルターを削除
$removed = remove_filter('the_content', 'wpautop'); 
?>
```

### 5. `post_custom` の使用

**修正箇所**: `/themes/bookstyle2015/gallery.php` の45行目

```php
// 修正前
<a href="<?php echo post_custom('リンクを追加'); ?>" target="_blank"><?php the_title(); ?></a>

// 修正後
<a href="<?php echo esc_url(get_post_meta($post->ID, 'リンクを追加', true)); ?>" target="_blank"><?php the_title(); ?></a>
```

## 検証手順

1. 環境を起動し、WordPressの初期設定を完了する
2. 管理画面から「bookstyle2015」テーマを有効化する
3. 上記の修正を適用し、サイトが正常に表示されるか確認する
4. 各機能（ギャラリー、リンク、新着情報など）が正常に動作するか確認する
