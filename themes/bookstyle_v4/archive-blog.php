<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">

        <header class="unified-header">
            <h1 class="unified-title-en">BLOG</h1>
            <p class="unified-title-jp">ブログ一覧</p>
        </header>

        <div class="blog-list">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post(); ?>
                    <article class="blog-item">
                        <a href="<?php the_permalink(); ?>" class="blog-item-inner">
                            <div class="blog-item-thumb">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/about_intro.jpg" alt="No image">
                                <?php endif; ?>
                            </div>
                            <div class="blog-item-content">
                                <div class="blog-item-meta">
                                    <span class="date">
                                        <?php the_time('Y/m/d'); ?>
                                    </span>
                                    <?php
                                    $blog_cats = get_the_terms(get_the_ID(), 'blog_category');
                                    if ($blog_cats && !is_wp_error($blog_cats)): ?>
                                        <span class="category"><?php echo esc_html($blog_cats[0]->name); ?></span>
                                    <?php endif; ?>
                                </div>
                                <h2 class="blog-item-title">
                                    <?php the_title(); ?>
                                </h2>
                                <div class="blog-item-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 80, '...'); ?>
                                </div>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p>記事が見つかりませんでした。</p>
            <?php endif; ?>
        </div>

        <div class="pagination">
            <?php
            echo paginate_links(array(
                'prev_text' => '<<',
                'next_text' => '>>',
            ));
            ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>