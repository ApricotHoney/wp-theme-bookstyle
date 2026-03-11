<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <header class="unified-header">
                    <h1 class="unified-title-en">BLOG</h1>
                    <p class="unified-title-jp">ブログ記事</p>
                </header>

                <div class="blog-single-wrapper">
                    <div class="content-container">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('unified-section'); ?>>
                            <h2 class="unified-h2"><?php the_title(); ?></h2>

                            <div class="post-meta-top" style="text-align: center; margin-bottom: 40px;">
                                <span class="date">
                                    <?php the_time('Y/m/d'); ?>
                                </span>
                                <?php
                                $blog_cats = get_the_terms(get_the_ID(), 'blog_category');
                                if ($blog_cats && !is_wp_error($blog_cats)): ?>
                                    <span class="category" style="margin-left: 20px; color: #6AACB8;">
                                        <?php echo esc_html($blog_cats[0]->name); ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="entry-content blog-body">
                                <?php the_content(); ?>
                            </div>

                            <?php if ( is_active_sidebar( 'post-bottom-widget' ) ) : ?>
                                <div class="post-bottom-widgets" style="margin-top: 40px; text-align: center;">
                                    <?php dynamic_sidebar( 'post-bottom-widget' ); ?>
                                </div>
                            <?php endif; ?>

                            <footer class="entry-footer"
                                style="margin-top: 50px; border-top: 1px dashed #ccc; padding-top: 20px;">
                                <?php
                                $blog_tags = get_the_terms(get_the_ID(), 'blog_tag');
                                if ($blog_tags && !is_wp_error($blog_tags)): ?>
                                    <div class="tags-links" style="color: #888;">
                                        #<?php echo join(' #', wp_list_pluck($blog_tags, 'name')); ?></div>
                                <?php endif; ?>
                            </footer>

                            <div class="post-navigation"
                                style="margin-top: 40px; border-top: 1px dashed #ccc; padding-top: 30px;">
                                <div class="nav-links"
                                    style="display: flex; justify-content: space-between; align-items: center;">
                                    <div class="nav-prev" style="flex: 1; text-align: left;">
                                        <?php
                                        $prev_post = get_previous_post();
                                        if ($prev_post):
                                            ?>
                                            <a href="<?php echo get_permalink($prev_post->ID); ?>"
                                                style="display: flex; align-items: center; text-decoration: none; color: #333;">
                                                <span class="arrow prev-arrow"
                                                    style="transform: scaleX(-1); margin-right: 15px; flex-shrink: 0;"></span>
                                                <span class="nav-title"
                                                    style="word-break: break-all;"><?php echo esc_html($prev_post->post_title); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="nav-center" style="margin: 0 15px; flex-shrink: 0;">
                                        <ul class="blog-category-list" style="margin: 0; padding: 0;">
                                            <li><a href="<?php echo home_url('/blog/'); ?>">BLOG一覧へ</a></li>
                                        </ul>
                                    </div>

                                    <div class="nav-next" style="flex: 1; text-align: right;">
                                        <?php
                                        $next_post = get_next_post();
                                        if ($next_post):
                                            ?>
                                            <a href="<?php echo get_permalink($next_post->ID); ?>"
                                                style="display: flex; align-items: center; justify-content: flex-end; text-decoration: none; color: #333;">
                                                <span class="nav-title"
                                                    style="word-break: break-all;"><?php echo esc_html($next_post->post_title); ?></span>
                                                <span class="arrow next-arrow" style="margin-left: 15px; flex-shrink: 0;"></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <aside class="blog-sidebar">
                        <div class="blog-category-nav blog-category-vertical">
                            <p class="blog-category-heading">カテゴリ</p>
                            <ul class="blog-category-list">
                                <li><a href="<?php echo esc_url(get_post_type_archive_link('blog')); ?>">すべて</a></li>
                                <li><a href="<?php echo esc_url(get_term_link('information', 'blog_category')); ?>">新作/お知らせ</a>
                                </li>
                                <li><a
                                        href="<?php echo esc_url(get_term_link('bookcover_guide', 'blog_category')); ?>">ブックカバー活用ガイド</a>
                                </li>
                                <li><a
                                        href="<?php echo esc_url(get_term_link('design-note', 'blog_category')); ?>">デザインの裏側/制作日記</a>
                                </li>
                                <li><a href="<?php echo esc_url(get_term_link('paid-sale', 'blog_category')); ?>">商用利用について</a>
                                </li>
                                <li><a href="<?php echo esc_url(get_term_link('hobby', 'blog_category')); ?>">本と手仕事</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>