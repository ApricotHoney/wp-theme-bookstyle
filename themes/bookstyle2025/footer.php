<!-- ============================================== -->
<!--            footer                              -->
<!-- ============================================== -->
<footer id="footer">
	<section>
		<div class="btmPr ta-c">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- pc_footer -->
			<ins class="adsbygoogle"
						style="display:inline-block;width:728px;height:90px"
						data-ad-client="ca-pub-9454169399006764"
						data-ad-slot="1599580937"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div><!-- .btmPr -->
		<div class="btmPr--sp ta-c">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- sp_footer -->
			<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-9454169399006764"
						data-ad-slot="3076314139"
						data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div><!-- .btmPrsp -->
		<div class="pageTop ta-c mt15 mb15"><a href="#pageTop"><img src="<?php echo get_template_directory_uri(); ?>/common/images/btn_pagetop.png" alt="ページトップへ戻る"></a></div>
	</section>
<div class="footer">
	<section>
		<div class="bLogo mr20 fl-l"><i class="icon-bs_s"> </i><?php bloginfo('name'); ?></div><!-- .bLogo -->
		<div class="footMenu mt05 fl-l">
			<?php wp_nav_menu(array('theme_location' => 'footMenu')); ?>
		</div><!-- .footMenu -->
		<div class="copyright mt10">copyrightBookStyleAllRightsReserved.</div>
	</section>
</div>
</footer>
<!-- ============================================== -->
<!--            sidePr                              -->
<!-- ============================================== -->
</div><!-- #sb-site -->
<!-- ===============▼スマホnaviここから▼=================== -->
<div class="sb-slidebar sb-right sb-style-push">
	<div class="sb-close"><a href="#">閉じる</a></div>
	<?php wp_nav_menu(array('theme_location' => 'spMenu')); ?>
	<div class="snsIcon">
		<div class="snsIcon__item"><a href="https://twitter.com/book_style_neri" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/common/images/icon_twitter.gif" alt="Twitter"></a></div>
		<div class="snsIcon__item"><a href="http://neri-bookstyle.tumblr.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/common/images/icon_tumbler.gif" alt="Tumblr"></a></div>
		<div class="snsIcon__item"><a href="https://instagram.com/neri_bookstyle/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/common/images/icon_instgram.gif" alt="Instgram"></a></div>
	</div>
</div>
<!-- ===============▲スマホnaviここまで▲=================== -->
<!-- ▼スマホ用メニュー -->
<script type="text/javascript">
  (function(jQuery) {
    jQuery(document).ready(function() {
      jQuery.slidebars();
    });
  }) (jQuery);
</script>
<?php wp_footer(); ?>
</body>
</html>
