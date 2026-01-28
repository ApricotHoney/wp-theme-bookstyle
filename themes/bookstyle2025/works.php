<?php
/*
Template Name: works_template
*/
?>
<?php $removed = remove_filter('the_content', 'wpautop'); ?>
<?php get_header(); ?>
<!-- ============================================== -->
<!--            maincontents                        -->
<!-- ============================================== -->
<div class="l_wrap--second">
<?php get_sidebar(); ?>
<div class="l_main--second">
<!-- ===============▼メインエリアここから▼=================== -->
<section>
<section>
<h2>タクソノミーの意味は？</h2>
<p>タクソノミーとは、情報を整理・分類するための仕組みです。WordPressにおいては、主に「カテゴリー」と「タグ」がタクソノミーとして機能します。</p>

<h3>カテゴリー</h3>
<p>カテゴリーは、ブログ記事やコンテンツを大きなグループに分類するために使用されます。例えば、「旅行」「料理」「テクノロジー」など、サイト全体の主要なテーマを表すのに適しています。</p>

<h3>タグ</h3>
<p>タグは、より詳細なキーワードでコンテンツを分類します。カテゴリーよりも細かく、特定の記事に関連するトピックを示すために使用されます。例えば、「イタリア」「パスタ」「スマートフォン」などです。</p>

<h3>タクソノミーのメリット</h3>
<ul>
  <li>サイト内の情報を整理し、ユーザーが目的の情報を見つけやすくする</li>
  <li>SEO対策として、検索エンジンにサイト構造を理解させやすくなる</li>
  <li>コンテンツ管理が容易になる</li>
</ul>
</section>
<h2 class="h2">Worksページについて</h2>
<p>Book Styleのデザインがどのようなところで使われているかをご紹介！<br>
配布・その他利用につきましては「MAIL」よりお問い合わせください。</p>

<?php
// タクソノミ取得
$catargs = array(
	'taxonomy' => 'works_add-tag'
);
$catlists = get_categories( $catargs );
foreach($catlists as $cat) : // 取得したカテゴリの配列でループを回す
?>
<section>
<h3 class="h3"><?php echo $cat->name; ?></h3>
<ul class="workList">
<?php
$args = array(
	'posts_per_page' => '-1', //表示件数。-1なら全件表示
	'post_type' => 'works_add',
	'works_add-tag' => $cat->slug
);
$my_posts = get_posts( $args );
if ( $my_posts ) { // 該当する投稿があったら
	foreach ( $my_posts as $post ) :
		setup_postdata( $post );
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
			<div class="workList__tit"><?php the_time('Y/m/d'); ?> | <?php the_title(); ?></div>
			<div class="workList__cont"><?php the_content(); ?></div>
		</li>
		<?php
	endforeach;
} else {
	echo 'このカテゴリに投稿はありません';
}
wp_reset_postdata();
?>
</ul>
</section>
<?php endforeach; ?>

</section>
<!-- ===============▲メインエリアここまで▲=================== -->

</div><!-- .l_main -->
</div><!-- .l_wrap -->
<?php get_footer(); ?>