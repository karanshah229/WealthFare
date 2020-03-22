<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
</head>
<body>
    <div uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container" uk-navbar style="background-color: black">
            <div class="uk-container-expand">
                <div uk-navbar="" class="uk-navbar montserrat">
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">
                            <li class="uk-hidden@m"><a class="uk-navbar-toggle" uk-navbar-toggle-icon uk-toggle="target: #sideNav"></a></li>
                            <li><a class="uk-navbar-item uk-logo" href="<?php echo site_url('')?>">
                            <img src="<?php echo get_theme_file_uri('/static/images/logo_1.png') ?>" width="65px" class="uk-visible@m">
                            <img src="<?php echo get_theme_file_uri('/static/images/logo_1.png') ?>" width="40px" class="uk-hidden@m">
                            <span class="uk-margin-left"><?php bloginfo('name') ?></span>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-navbar-right uk-visible@m">
                <ul class="uk-navbar-nav">
                    <li><a href="<?php echo site_url('/blog')?>" <?php if (is_page('blog')) echo 'class="current-menu-item"'?> >Blog</a></li>
                    <li><a href="<?php echo site_url('/about-us')?>" <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 11) echo 'class="current-menu-item"' ?>>About Us</a></li>
                    <li><a href="<?php echo site_url('')?>"><span uk-icon="search" style="padding-right: 10px"></span>Search</a></li>
                    <li class="uk-margin-small-right"><a href="<?php echo site_url('/login')?>"><span uk-icon="user" style="padding-right: 10px"></span>Login</a></li>
                </ul>
            </div>
        </nav>
    </div>


    <div id="sideNav" uk-offcanvas="overlay: true; mode: slide" style="background-color: rgb(0,0,0,0.35)">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button><br><br>
            <div>
                <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                    <li><a href="<?php echo site_url('')?>" <?php if (is_page('')) echo 'class="current-menu-item"' ?>><span uk-icon="home" style="padding-right: 10px"></span>Home</a></li>
                    <li><a href="<?php echo site_url('blog')?>" <?php if (is_home() == True) echo 'class="current-menu-item"' ?>><span uk-icon="file-text" style="padding-right: 10px"></span>Blog</a></li>
                    <li><a href="<?php echo site_url('about-us')?>" <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 11) echo 'class="current-menu-item"' ?>><span uk-icon="info" style="padding-right: 10px"></span>About Us</a></li>
                    <li><a href="<?php echo site_url('')?>"><span uk-icon="search" style="padding-right: 10px"></span>Search</a></li>
                    <li class="uk-margin-small-right"><a href="<?php echo site_url('/login')?>"><span uk-icon="user" style="padding-right: 10px"></span>Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- <div class="uk-container uk-container-center open_sans"> -->