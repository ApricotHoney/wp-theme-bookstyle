<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        <header class="page-header">
            <h1 class="page-title">GALLERY</h1>
            <p class="page-description">
                BookStyleのデザインを実際に使用している写真を、使用者の方からご提供頂き、展示しています。<br>
                ぜひ、Book Styleのデザインを使用している写真をお送りください！<a href="<?php echo home_url('/photo-form'); ?>">募集はこちらから！</a>
            </p>
        </header>

        <section class="gallery-section">
            <ul class="gallery-list">
                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li class="gallery-item">
                    <p class="gallery-date"><?php the_time('Y/m/d'); ?></p>
                    
                    <?php if(has_post_thumbnail()): ?>
                    <div class="gallery-photo">
                        <a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="lightbox">
                            <?php the_post_thumbnail('gallery-thumbnail'); ?>
                        </a>
                    </div>
                    <?php endif; ?>

                    <ul class="gallery-tags">
                        <?php echo get_the_term_list_nolink( get_the_ID(), 'gallery_add-tag', '<li>', '</li><li>', '</li>' ); ?>
                    </ul>

                    <p class="gallery-client">
                        <?php 
                        $link = get_post_meta(get_the_ID(), 'リンクを追加', true);
                        if(empty($link)): ?>
                            <?php the_title(); ?>
                        <?php else: ?>
                            <a href="<?php echo esc_url($link); ?>" target="_blank"><?php the_title(); ?></a>
                        <?php endif; ?>
                    </p>

                    <div class="gallery-content">
                        <?php the_content(); ?>
                    </div>
                </li>
                <?php endwhile; endif; ?>
            </ul>
        </section>
        
        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
