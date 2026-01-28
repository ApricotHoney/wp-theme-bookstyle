<?php
/**
 * Template Name: Gallery Page
 */
get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        
        <div class="content-container">
            <header class="unified-header">
                <h1 class="unified-title-en">Gallery</h1>
                <p class="unified-title-jp">Galleryページについて</p>
            </header>

            <section class="unified-section">
                <p>BookStyleのデザインを実際に使用している写真を、使用者の方からご提供頂き、展示しています。<br>
                ぜひ、Book Styleのデザインを使用している写真をお送りください！<a href="<?php echo home_url('/photo-form'); ?>">募集はこちらから！</a></p>
            </section>

            <section class="unified-section">
                <ul class="gallery">
                    <?php
                    $gallery_query = new WP_Query( array(
                        'post_type' => 'gallery_add',
                        'post_status' => 'publish',
                        'orderby' => 'ID',
                        'order' => 'DESC',
                        'posts_per_page' => -1
                    ) );

                    if ( $gallery_query->have_posts() ) : while ( $gallery_query->have_posts() ) : $gallery_query->the_post(); ?>
                    <li>
                        <p class="gallery__date ta-r"><?php the_time('Y/m/d'); ?></p>
                        
                        <?php if(has_post_thumbnail()): ?>
                        <div class="gallery__photo">
                            <a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="lightbox">
                                <?php the_post_thumbnail('gallery-thumbnail'); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <ul class="gallery__tagbox">
                            <?php echo get_the_term_list_nolink( get_the_ID(), 'gallery_add-tag', '<li>', '</li><li>', '</li>' ); ?>
                        </ul>

                        <p class="gallery__client">
                            <?php 
                            $link = get_post_meta(get_the_ID(), 'リンクを追加', true);
                            if(empty($link)): ?>
                                <?php the_title(); ?>
                            <?php else: ?>
                                <a href="<?php echo esc_url($link); ?>" target="_blank" class="newWindow"><?php the_title(); ?></a>
                            <?php endif; ?>
                        </p>

                        <p class="gallery__content">
                            <?php the_content(); ?>
                        </p>
                    </li>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </ul>
            </section>
        </div>

    </div>
</main>

<?php get_footer(); ?>
