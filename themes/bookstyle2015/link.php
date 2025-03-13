<?php
/*
Template Name: link_template
*/
?>
<?php remove_filter('the_content', 'wpautop'); ?>
<?php get_header(); ?>
<!-- ============================================== -->
<!--            maincontents                        -->
<!-- ============================================== -->
<div class="l_wrap--second">
<?php get_sidebar(); ?>
<div class="l_main--second">
<!-- ===============▼メインエリアここから▼=================== -->
<section>
<h2 class="h2">Book Styleへのリンク</h2>
<p>当サイトはリンクフリーです。</p>
<ul class="list">
	<li>Sitename → Book Style</li>
	<li>Owner →　ねり</li>
	<li>URL　→　http://bookstyle.xyz</li>
</ul>
<p>バナーは右クリックでダウンロードしてお持ち帰りください。<br>
<span class="fz-s">※直リンクはサーバーに負担がかかりますのでお止めください。</span></p>
<p>31×31 <img src="<?php bloginfo('template_directory');?>/common/images/link/bs_banner3b.gif" alt=""> <img src="<?php bloginfo('template_directory');?>/common/images/link/bs_banner3g.gif" alt=""> <img src="<?php bloginfo('template_directory');?>/common/images/link/bs_banner3o.gif" alt=""> <img src="<?php bloginfo('template_directory');?>/common/images/link/bs_banner3p.gif" alt=""></p>
<p>88×31 <img src="<?php bloginfo('template_directory');?>/common/images/link/bs_banner2.gif" alt=""></p>
<p>200×40 <img src="<?php bloginfo('template_directory');?>/common/images/link/bs_banner1.gif" alt=""></p>

<h2 class="h2 mt40">リンク集</h2>
<h3 class="h3"><i class="icon-menu07"> </i>参考・お世話になったサイト様</h3>
<p><a href="http://chobitt.com/book/" target="_blank">本の洋服屋</a> | <a href="http://www.wolca.info/" target="_blank">WOLCA</a> | <a href="http://www.e-whs.tk/" target="_blank">無料レンタルサーバ WHSサーバ</a> | <a href="http://booklog.jp/" target="_blank">web本棚サービスブクログ</a> </p>

<h3 class="h3"><i class="icon-menu07"> </i>SPECIAL THANKS</h3>
<ul class="linkList mb30">
		<?php
		$wp_query = new WP_Query();
		$param = array(
			'posts_per_page' => '-1', //表示件数。-1なら全件表示
			'post_type' => 'link_site', //カスタム投稿タイプの名称を入れる
			'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
			'orderby' => 'ID', //ID順に並び替え
			'order' => 'DESC'
		);
		$wp_query->query($param);
		if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
		?>
			<li>
				<?php
				$days = 7;
				$today = date('U');
				$date = get_the_time('U');
				$period = date('U', ($today - $date)) / 86400;
				if ($days > $period) {
				echo '<div class="newIcon--second">New!</div>';
				}
				?>
				<a href="<?php the_content(); ?>" target="_blalnk"><?php the_title(); ?></a>
			</li>
		<?php endwhile; endif; ?>
</ul>
</section>
<!-- ===============▲メインエリアここまで▲=================== -->

</div><!-- .l_main -->
</div><!-- .l_wrap -->
<?php get_footer(); ?>