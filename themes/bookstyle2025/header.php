<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo('name'); ?><?php if ( is_single() ) { ?> | Blog Archive <?php } ?> <?php wp_title(); ?></title>
	<meta content="ブックカバーデザイン無料配布サイト Book Style" name="description" />
	<meta content="ブックカバー,デザイン,無料,配布,洋書" name="keywords" />
	<link rel="SHORTCUT ICON" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="only screen and (min-width:681px)">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/common/css/common.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/common/css/style_sp.css" media="only screen and (max-width:680px)">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/common/css/slidebars.css" media="only screen and (max-width:680px)">
<?php if(is_page()): ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/common/css/second.css" media="only screen and (min-width:681px)">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/common/css/second_sp.css" media="only screen and (max-width:680px)">
<?php endif; ?>

	<!--[if lt IE 9]>
	<?php wp_enqueue_script('html5shiv', get_template_directory_uri() . '/common/js/html5shiv.min.js', array('jquery')); ?>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<?php wp_enqueue_script('selectivizr', get_template_directory_uri() . '/common/js/selectivizr.js', array('jquery')); ?>
	<![endif]-->
	<!-- ▼google 自動広告/analytics -->
	<script data-ad-client="ca-pub-9454169399006764" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-21182398-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-21182398-1');
</script>
<?php wp_head(); ?>
<script type="text/javascript">
	//jQueryとprototypeの競合を避ける
	jQuery.noConflict();
</script>
</head>
<body>
<div id="sb-site"><!-- スライドメニューのメインコンテンツ部分 -->
<!-- ============================================== -->
<!--            Header                              -->
<!-- ============================================== -->
<div id="pageTop"></div>
<div class="spNavi">
	<div class="spNavi_logo"><i class="icon-bs_s"></i><?php bloginfo('name'); ?></div>
	<div class="sb-toggle-right navbar-right"><!-- スマホメニューボタン -->
		<div class="spNavi_menu"><img src="<?php echo get_template_directory_uri(); ?>/common/images/sp_nav_icon.gif" alt="menu"></div>
	</div>
</div>
<header id="header" class="header">
	<div class="header--bg">
		<section>
			<div class="snsIcon">
				<div class="snsIcon__item"><a href="https://twitter.com/book_style_neri" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/common/images/icon_twitter.gif" alt="Twitter"></a></div>
				<div class="snsIcon__item"><a href="http://neri-bookstyle.tumblr.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/common/images/icon_tumbler.gif" alt="Tumblr"></a></div>
				<div class="snsIcon__item"><a href="https://instagram.com/neri_bookstyle/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/common/images/icon_instgram.gif" alt="Instgram"></a></div>
			</div><!-- .snsIcon -->
			<div class="hLogo">
				<?php if(is_home()): // ホームが表示されている場合、ブログタイトルを H1 で表示 ?>
				<h1><span>ブックカバーデザイン無料配布サイト</span><?php bloginfo('name'); ?></h1>
				<?php else: // ホーム以外のページが表示されている場合は 各ページ名を表示 ?>
				<h1><span><?php echo post_custom('ページの概要'); ?></span><?php wp_title(''); ?></h1>
				<?php endif; ?>
			</div><!-- .hLogo -->
			<?php if(is_home()): // ホームが表示されている場合表示 ?>
			<div class="lastUp">
				<div class="lastUP__tit">Information... <a href="<?php echo esc_url(get_site_url()); ?>/info/" class="more"><i class="icon-allow_black"> </i>一覧をみる</a></div>
				<dl>
					<?php
					$wp_query = new WP_Query();
					$param = array(
						'posts_per_page' => '2', //表示件数。-1なら全件表示
						'post_type' => 'lastup', //カスタム投稿タイプの名称を入れる
						'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
						'orderby' => 'ID', //ID順に並び替え
						'order' => 'DESC'
					);
					$wp_query->query($param);
					if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
					?>
						<dt><?php the_date('Y/m/d'); ?></dt>
						<dd><?php 
						// フィルターを削除
						$removed = remove_filter('the_content', 'wpautop'); 
						the_content(); 
						?></dd>
					<?php endwhile; endif; ?>
				</dl>
			</div><!-- .lustUp -->
			<?php wp_reset_query(); ?>
			<?php endif; ?>
		</section>
	</div>
	<section>
		<div class="gMenu">
			<?php wp_nav_menu(array('theme_location' => 'gMenu')); ?>
		</div>
	</section>
</header><!-- /header -->