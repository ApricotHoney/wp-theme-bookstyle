<?php get_header(); ?>

<!-- ============================================== -->
<!--            maincontents                        -->
<!-- ============================================== -->
<div class="l_wrap">
	<?php get_sidebar(); ?>
<div class="l_main">
	<div class="coverbtn__group">
		<div class="search__tit"><i class="icon-search"> </i>ブックカバー検索</div><!-- .search -->
		<div class="search__pulldown">
			<ul>
			<li><a href="#">カテゴリ▼</a>
				<ul>
					<li class="filter" data-filter="all" value="すべて">すべて</li>
					<!-- <li class="filter" data-filter=".season" value="季節のおすすめ">季節のおすすめ</li> -->
					<li class="filter" data-filter=".antique" value="古洋書風">古洋書風</li>
					<li class="filter" data-filter=".pattern" value="パターン">パターン</li>
					<li class="filter" data-filter=".animal" value="動物モチーフ">動物モチーフ</li>
					<li class="filter" data-filter=".plant" value="植物モチーフ">植物モチーフ</li>
					<li class="filter" data-filter=".collage" value="コラージュ">コラージュ</li>
					<li class="filter" data-filter=".lace" value="レース">レース</li>
					<li class="filter" data-filter=".flag" value="国旗">国旗</li>
					<li class="filter" data-filter=".photo" value="写真">写真</li>
					<li class="filter" data-filter=".bookmaker" value="しおり">しおり</li>
					<li class="filter" data-filter=".other" value="その他">その他</li>
				</ul>
			</li>
			<li><a href="#">並べ替え▼</a>
				<ul>
					<li class="sort" data-sort="myorder:desc" value="新しいもの順">新しいもの順</li>
					<li class="sort" data-sort="myorder:asc" value="古いもの順">古いもの順</li>
					<li class="sort" data-sort="random" value="ランダム">ランダム</li>
				</ul>
			</li>
			</ul>
			<!-- <div class="groupBtn fukidashi" title="ダウンロードしたいデザインのチェックボックスを選択し、一括ダウンロードできます。"><i class="icon-dl"> </i>まとめてダウンロード</div> -->
		</div>
	</div>
	<!-- ===============▼カバーリストここから▼=================== -->
	<div id="Container" class="coverList mt20 mb20">
		<?php
		$wp_query = new WP_Query();
		$param = array(
			'posts_per_page' => '-1', //表示件数。-1なら全件表示
			'post_type' => 'post', //メインの投稿タイプ
			'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
			'orderby' => 'date', //date順に並び替え
			'order' => 'DESC'
		);
		$wp_query->query($param);
		if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
		//カテゴリー名を取得
		$slugs = "";
		$cats = get_the_category();
		foreach( $cats as $cat ) {
			$slugs .=$cat->slug . ' ';
		}
		?>
		<div class="coverList__box mix <?php echo rtrim( $slugs, " " ); ?>" data-myorder="<?php the_title(); ?>">
			<div class="coverList__box__tit">
<!-- 				<div class="coverlist__box__checkbtn mt10">
					<input type="checkbox" id="dl<?php the_title(); ?>" class="css-checkbox lrg"/>
					<label for="dl<?php the_title(); ?>" name="dl<?php the_title(); ?>_lbl" class="css-label lrg vlad"></label>
				</div> -->
				<div class="number"><span>No.</span><?php the_title(); ?></div>
				<?php
				$days = 7;
				$today = date('U');
				$date = get_the_time('U');
				$period = date('U', ($today - $date)) / 86400;
				if ($days > $period) {
				echo '<div class="newIcon mt05">New!</div>';
				}
				?>
				<div class="date mt15"><?php the_time('Y/m/d'); ?></div>
			</div>
			<div class="coverList__box__item">
				<a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" rel="lightbox[bookcover]"><?php the_post_thumbnail('bookcover-thumbnail'); ?></a>
			</div>
			<div class="coverList__box__btn coverList__box__btn--green mt05">
				<a href="http://bookstyle.xyz/cover/BC_<?php the_title(); ?>.zip" onclick="ga('send', 'event', 'bc_count', 'downlode', 'BC_<?php the_title(); ?>');"><i class="icon-dl"> </i>ダウンロード</a>
			</div>
		</div><!-- .coverList__item -->
		<?php endwhile; endif; ?>

<!-- 		<div class="coverList__box mix antique" data-myorder="1">
			<div class="coverList__box__tit">
				<div class="coverlist__box__checkbtn mt10">
					<input type="checkbox" id="dl185" class="css-checkbox lrg" checked="checked"/>
					<label for="dl185" name="dl185_lbl" class="css-label lrg vlad"></label></div>
				<div class="number"><span>No.</span>185</div>
				<div class="newIcon mt05">New!</div>
				<div class="date mt15">2015/05/12</div>
			</div>
			<div class="coverList__box__item">
				<img src="http://dummyimage.com/210x137/ccc/999" />
			</div>
			<div class="coverList__box__btn coverList__box__btn--green mt05">
				<a href=""><i class="icon-dl"> </i>ダウンロード</a>
			</div>
		</div> --><!-- .coverList__item -->
	</div><!-- .coverList -->
	<!-- ===============▲カバーリストここまで▲=================== -->
</div><!-- .l_main -->
</div><!-- .l_wrap -->

<?php get_footer(); ?>