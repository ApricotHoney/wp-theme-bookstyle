<?php
// スタイルシートとスクリプトの読み込みコードを関数にまとめる
function bookstyle_scripts() {
  /*
   * wp_enqueue_style() を使って style.css を登録・読み込みキューに追加。
   * genericons という登録済みスタイルシートを依存指定し
   * 自動的に style.css より先に読み込ませる。
   */
  wp_enqueue_style( 'normalize', get_template_directory_uri() . '/common/css/normalize.min.css' );
  wp_enqueue_style( 'common', get_template_directory_uri() . '/common/css/common.css' );
  wp_enqueue_style( 'powertip', get_template_directory_uri() . '/common/css/jquery.powertip.min.css' );
  /*
   * wp_enqueue_script() を使って functions.js を登録・読み込みキューに追加。
   * jquery を依存指定し自動的に先に読み込ませる。
   * 20140319 というバージョン文字列を URL のクエリーストリングに付加し
   * バージョンの異なるファイルキャッシュがある場合は更新されるようにする。
   * スクリプトをフッターエリアで読み込ませる（多くの場合この設定が望ましい）。
   */
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script('slidebar', get_template_directory_uri() . '/common/js/slidebars.min.js', array('jquery'));
  wp_enqueue_script('footerfixed', get_template_directory_uri() . '/common/js/footerFixed.min.js', array('jquery'));
  wp_enqueue_script('sidefix', get_template_directory_uri() . '/common/js/sidefix.js', array('jquery'));
if (is_home()) {
  wp_enqueue_script('mixitup', get_template_directory_uri() . '/common/js/jquery.mixitup.js', array('jquery'));
  wp_enqueue_script('powertip', get_template_directory_uri() . '/common/js/jquery.powertip.min.js', array('jquery'));
  wp_enqueue_script('indexpage', get_template_directory_uri() . '/common/js/indexpage.js', false, '1.0', true );
  }
}
// bookstyle_scripts() をサイト公開側で呼び出す。
add_action( 'wp_enqueue_scripts', 'bookstyle_scripts' );

/* カスタムメニューの設定 */
register_nav_menus(array(
    'gMenu' => 'グローバルメニュー',
    'footMenu' => 'フッターメニュー',
    'spMenu' => 'スマホメニュー'
    ));

add_action( 'init', 'my_custom_init' );
//アイキャッチ画像追加
add_theme_support('post-thumbnails');
//サムネイルサイズ追加
function add_thumbnail_size() {
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'gallery-thumbnail', 250, 188, true );
  add_image_size( 'bookcover-thumbnail', 210, 149, false );
}
add_action( 'after_setup_theme', 'add_thumbnail_size' );
//アイキャッチ画像のURL取得
function get_eye_url() {
  $image_id = get_post_thumbnail_id();
  $image_url = wp_get_attachment_image_src(
  $image_id,'large', true);
  if (is_array($image_url) && isset($image_url[0])) {
    echo esc_url($image_url[0]);
  }
}
function my_custom_init() {
    //カスタム投稿タイプ　新着情報
    register_post_type( 'lastup', array(
        'label' => '新着情報',
        'public' => true,
        'supports' => array( 'editor', 'custom-fields' ),
        'menu_position' => 5,
        'has_archive' => true
    ));
    //カスタム投稿タイプ　リンクサイト追加
    register_post_type( 'link_site', array(
        'label' => 'LINK',
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields' ),
        'menu_position' => 5,
        'has_archive' => true
    ));
    //カスタム投稿タイプ　ギャラリー追加
    register_post_type( 'gallery_add', array(
        'label' => 'GALLERY',
        'public' => true,
        'supports' => array( 'title', 'editor' , 'excerpt' , 'custom-fields','thumbnail' ),
        'menu_position' => 5,
        'has_archive' => true
    ));
    //カスタム投稿タイプ　Works追加
    register_post_type( 'works_add', array(
        'label' => 'WORKS',
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields' ),
        'menu_position' => 5,
        'has_archive' => true
    ));
		//カスタムタクソノミー、タグタイプ
      register_taxonomy(
        'gallery_add-tag', 
        'gallery_add', 
        array(
          'hierarchical' => false, 
          'update_count_callback' => '_update_post_term_count',
          'label' => 'デザインNo',
          'singular_label' => 'デザインNo',
          'public' => true,
          'show_ui' => true
        )
      );
      register_taxonomy(
        'works_add-tag', 
        'works_add', 
        array(
          'hierarchical' => false, 
          'update_count_callback' => '_update_post_term_count',
          'label' => '使用用途',
          'singular_label' => '使用用途',
          'public' => true,
          'show_ui' => true
        )
      );
    register_taxonomy(
      'lastup-tag', 
      'lastup', 
      array(
        'hierarchical' => false, 
        'update_count_callback' => '_update_post_term_count',
        'label' => '投稿年度',
        'singular_label' => '投稿年度',
        'public' => true,
        'show_ui' => true
      )
    );
}
//タクソノミー名からリンクをカットする
function get_the_term_list_nolink( $id = 0, $taxonomy, $before = '', $sep = '', $after = '' ) {
 $terms = get_the_terms( $id, $taxonomy ); 
 
 if ( is_wp_error( $terms ) )
 return $terms;
 
 if ( empty( $terms ) )
 return false;
 
 foreach ( $terms as $term ) {
 $term_names[] = $term->name ;
 }
 
 return $before . join( $sep, $term_names ) . $after;
}
?>
