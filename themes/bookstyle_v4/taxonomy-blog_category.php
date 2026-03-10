<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">

        <header class="unified-header">
            <h1 class="unified-title-en">BLOG</h1>
            <p class="unified-title-jp">ブログ一覧</p>
        </header>

        <div class="blog-category-nav">
            <p class="blog-category-heading">カテゴリ</p>
            
            <?php $current_term = is_tax('blog_category') ? get_queried_object()->slug : ''; ?>

            <!-- PC/Tablet View: List -->
            <ul class="blog-category-list">
                <li><a href="<?php echo esc_url(get_post_type_archive_link('blog')); ?>"
                        class="<?php echo empty($current_term) ? 'is-active' : ''; ?>">すべて</a></li>
                <li><a href="<?php echo esc_url(get_term_link('information', 'blog_category')); ?>"
                        class="<?php echo ($current_term === 'information') ? 'is-active' : ''; ?>">新作/お知らせ</a></li>
                <li><a href="<?php echo esc_url(get_term_link('bookcover_guide', 'blog_category')); ?>"
                        class="<?php echo ($current_term === 'bookcover_guide') ? 'is-active' : ''; ?>">ブックカバー活用ガイド</a>
                </li>
                <li><a href="<?php echo esc_url(get_term_link('design-note', 'blog_category')); ?>"
                        class="<?php echo ($current_term === 'design-note') ? 'is-active' : ''; ?>">デザインの裏側/制作日記</a>
                </li>
                <li><a href="<?php echo esc_url(get_term_link('paid-sale', 'blog_category')); ?>"
                        class="<?php echo ($current_term === 'paid-sale') ? 'is-active' : ''; ?>">商用利用について</a></li>
                <li><a href="<?php echo esc_url(get_term_link('hobby', 'blog_category')); ?>"
                        class="<?php echo ($current_term === 'hobby') ? 'is-active' : ''; ?>">本と手仕事</a></li>
            </ul>

            <!-- SP View: Select -->
            <div class="blog-category-select-wrapper sp-only">
                <select class="blog-category-select" onchange="if(this.value) window.location.href=this.value;">
                    <option value="<?php echo esc_url(get_post_type_archive_link('blog')); ?>" <?php selected(empty($current_term), true); ?>>すべて</option>
                    <option value="<?php echo esc_url(get_term_link('information', 'blog_category')); ?>" <?php selected($current_term === 'information', true); ?>>新作/お知らせ</option>
                    <option value="<?php echo esc_url(get_term_link('bookcover_guide', 'blog_category')); ?>" <?php selected($current_term === 'bookcover_guide', true); ?>>ブックカバー活用ガイド</option>
                    <option value="<?php echo esc_url(get_term_link('design-note', 'blog_category')); ?>" <?php selected($current_term === 'design-note', true); ?>>デザインの裏側/制作日記</option>
                    <option value="<?php echo esc_url(get_term_link('paid-sale', 'blog_category')); ?>" <?php selected($current_term === 'paid-sale', true); ?>>商用利用について</option>
                    <option value="<?php echo esc_url(get_term_link('hobby', 'blog_category')); ?>" <?php selected($current_term === 'hobby', true); ?>>本と手仕事</option>
                </select>
            </div>
        </div>

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
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/noimage.png" alt="No image">
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