<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">
        
        <div id="cover-grid" class="cover-grid">
            <?php
            $posts_per_shelf = 6; // Adjust based on design
            $count = 0;
            
            if ( have_posts() ) : 
                echo '<div class="book-shelf-row">'; // Start first shelf
                
                while ( have_posts() ) : the_post();
                    if ($count > 0 && $count % $posts_per_shelf == 0) {
                        echo '</div><div class="book-shelf-row">'; // Close previous and start new shelf
                    }
                    
                    $cats = get_the_category();
                    $slugs = [];
                    foreach($cats as $cat) { $slugs[] = $cat->slug; }
                    $class_names = implode(' ', $slugs);
            ?>
            <article class="cover-item <?php echo esc_attr($class_names); ?>">
                <!-- Cover Image -->
                <div class="cover-image">
                    <?php if(has_post_thumbnail()): ?>
                        <a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="lightbox" data-id="<?php the_ID(); ?>">
                            <?php the_post_thumbnail('bookcover-thumbnail'); ?>
                        </a>
                    <?php else: 
                        // Sample images for demo (Thumbnail + Modal pair)
                        $samples = [
                            ['thumb' => 'bookcover_thum_sample1.png', 'modal' => 'bookcover_modal_sample1.png'],
                            ['thumb' => 'bookcover_thum_sample2.png', 'modal' => 'bookcover_modal_sample2.png']
                        ];
                        // Use ID to pick deterministically
                        $pick = $samples[ get_the_ID() % count($samples) ];
                        $thumb_url = get_template_directory_uri() . '/images/' . $pick['thumb'];
                        $modal_url = get_template_directory_uri() . '/images/' . $pick['modal'];
                    ?>
                        <a href="<?php echo esc_url($modal_url); ?>" class="lightbox" data-id="<?php the_ID(); ?>">
                            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" style="width:210px; height:auto; display:block; margin:0 auto;">
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Info (Hidden on shelf, generally for modal) -->
                <div class="cover-meta" style="display:none;">
                    <div class="cover-title"><?php the_title(); ?></div>
                    <div class="cover-date"><?php the_time('Y/m/d'); ?></div>
                </div>
            </article>
            <?php 
                    $count++;
                endwhile; 
                echo '</div>'; // Close last shelf
            else:
            ?>
                <p>該当するブックカバーは見つかりませんでした。</p>
            <?php
            endif;
            // No wp_reset_postdata needed for main query
            ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>
