<?php get_header(); ?>

<main id="main" class="l_main">
    <div class="l_wrap">

        <!-- Search/Filter Header -->


        <div id="cover-grid" class="cover-grid">

            <?php
            // Custom logic to handle Front Page filtering
            $paged = (get_query_var('page')) ? get_query_var('page') : ((get_query_var('paged')) ? get_query_var('paged') : 1);

            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1, // Show all
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            // Category Filter
            if (isset($_GET['cat']) && !empty($_GET['cat']) && $_GET['cat'] > 0) {
                $args['cat'] = intval($_GET['cat']);
            }

            // Sort Filter
            if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                switch ($_GET['sort']) {
                    case 'old':
                        $args['order'] = 'ASC';
                        break;
                    case 'rand':
                        $args['orderby'] = 'rand';
                        break;
                    case 'new':
                    default:
                        $args['order'] = 'DESC';
                        break;
                }
            }

            // Color Filter
            // Use get_query_var if available, fallback to $_GET
            $color_query = get_query_var('color') ? get_query_var('color') : (isset($_GET['color']) ? $_GET['color'] : '');

            if (!empty($color_query)) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'color',
                        'field' => 'slug',
                        'terms' => sanitize_text_field($color_query),
                    ),
                );
            }

            $the_query = new WP_Query($args);

            $count = 0;

            if ($the_query->have_posts()):
                echo '<div class="book-shelf-row">'; // Unified shelf for responsiveness
            
                while ($the_query->have_posts()):
                    $the_query->the_post();

                    $cats = get_the_category();
                    $slugs = [];
                    if ($cats) {
                        foreach ($cats as $cat) {
                            $slugs[] = $cat->slug;
                        }
                    }
                    $class_names = implode(' ', $slugs);
                    ?>
                    <article class="cover-item <?php echo esc_attr($class_names); ?>">
                        <!-- Cover Image -->
                        <div class="cover-image" style="position: relative;">
                            <?php
                            $post_date = get_the_time('U');
                            $month_ago = strtotime('-1 month');
                            if ($post_date > $month_ago): ?>
                                <span class="newicon">New</span>
                            <?php endif; ?>
                            <?php if (has_post_thumbnail()): ?>
                                <a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" class="lightbox"
                                    data-id="<?php the_ID(); ?>">
                                    <?php the_post_thumbnail('bookcover-thumbnail'); ?>
                                </a>
                            <?php else:
                                // Sample images for demo (Thumbnail + Modal pair)
                                $samples = [
                                    ['thumb' => 'bookcover_thum_sample1.png', 'modal' => 'bookcover_modal_sample1.png'],
                                    ['thumb' => 'bookcover_thum_sample2.png', 'modal' => 'bookcover_modal_sample2.png']
                                ];
                                // Use ID to pick deterministically
                                $pick = $samples[get_the_ID() % count($samples)];
                                $thumb_url = get_template_directory_uri() . '/images/' . $pick['thumb'];
                                $modal_url = get_template_directory_uri() . '/images/' . $pick['modal'];
                                ?>
                                <a href="<?php echo esc_url($modal_url); ?>" class="lightbox" data-id="<?php the_ID(); ?>">
                                    <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>">
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- Info (Hidden on shelf, generally for modal) -->
                        <div class="cover-meta" style="display:none;">
                            <div class="cover-images-data">
                                <?php
                                $images = array();
                                if (has_post_thumbnail()) {
                                    $images[] = wp_get_attachment_url(get_post_thumbnail_id());
                                }
                                if (function_exists('get_field')) {
                                    // ACF Free: Check up to 3 individual image fields
                                    for ($i = 1; $i <= 3; $i++) {
                                        $sub_img = get_field('sub_image_' . $i);
                                        if ($sub_img) {
                                            // Handle case where return format is Array or URL
                                            if (is_array($sub_img) && isset($sub_img['url'])) {
                                                $images[] = $sub_img['url'];
                                            } elseif (is_string($sub_img)) {
                                                $images[] = $sub_img;
                                            }
                                        }
                                    }
                                }
                                echo esc_html(json_encode($images));
                                ?>
                            </div>
                            <div class="cover-title"><?php the_title(); ?></div>
                            <div class="cover-commercial-url">
                                <?php echo esc_url(get_post_meta(get_the_ID(), '商用利用URL', true)); ?>
                            </div>
                            <div class="cover-date"><?php the_time('Y/m/d'); ?></div>
                            <div class="cover-tags">
                                <?php
                                $post_tags = get_the_tags();
                                if ($post_tags) {
                                    foreach ($post_tags as $tag) {
                                        echo '#' . $tag->name . ' ';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </article>
                    <?php
                    $count++;
                endwhile;
                echo '</div>'; // Close shelf container
            else:
                // No posts found
                echo '<p>記事が見つかりませんでした。</p>';
            endif;
            wp_reset_postdata();
            ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>