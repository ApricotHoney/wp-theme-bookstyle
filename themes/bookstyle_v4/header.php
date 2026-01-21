<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <a href="<?php echo home_url('/'); ?>" class="logo-box">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="Book Style" class="logo-img">
            </a>
        </div>

        <nav class="gMenu">
            <?php wp_nav_menu(array(
                'theme_location' => 'gMenu',
                'container' => false,
                'menu_class' => 'gMenu-list',
                'fallback_cb' => false
            )); ?>
            <!-- Fallback static menu if empty -->
            <?php if (!has_nav_menu('gMenu')): ?>
            <ul class="gMenu-list">
                <li><a href="<?php echo home_url('/'); ?>">> HOME</a></li>
                <li><a href="<?php echo home_url('/about/'); ?>">> ABOUT</a></li>
                <li><a href="<?php echo home_url('/works/'); ?>">> WORKS</a></li>
                <li><a href="<?php echo home_url('/gallery/'); ?>">> GALLERY</a></li>
                <li><a href="<?php echo home_url('/blog/'); ?>">> BLOG</a></li>
                <li><a href="<?php echo home_url('/howto/'); ?>">> HOWTO</a></li>
                <li><a href="<?php echo home_url('/mail/'); ?>">> MAIL</a></li>
            </ul>
            <?php endif; ?>
        </nav>

        <div class="sidebar-search">
            <span class="search-label">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon_search.png" alt="Search" style="width:16px; vertical-align:middle;"> ブックカバー検索
            </span>
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <input type="text" value="" name="s" placeholder="検索...">
            </form>
            <!-- Custom filters (mockup) -->
             <div style="margin-top:10px;">
                <select style="width:100%; padding:5px; margin-bottom:5px;"><option>ジャンルでさがす</option></select>
                <select style="width:100%; padding:5px;"><option>並び替え</option></select>
             </div>
        </div>

        <div class="sidebar-social">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_x.png" alt="X"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_instagram.png" alt="Instagram"></a>
        </div>
    </aside>
