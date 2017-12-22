<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset') ?>" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="<?php bloginfo('description') ?>" />
        <?php get_template_part('templates/icons'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <?php wp_head() ?>


    </head>

    <body <?php body_class() ?> itemscope itemtype="http://schema.org/WebPage">

        <?php
        do_action('before_main_content');
        get_template_part('components/bs-main-navbar');
        ?>

        <header itemscope itemprop="http://www.schema.org/WPHeader" class="animated fadeInDown <?php
        if (is_front_page()) {
            echo 'header';
        } else {
            echo 'header-page';
        }
        ?>">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3 verticalmiddle hidden-xs">
                        <?php
                        $logo_src = get_option('theme_options_logo_src');
                        $logo_src_scroll = get_option('theme_options_logo_src_scroll');
                        if (!empty($logo_src)) {
                            ?>
    <?php if (is_front_page()) { ?>
                                <a class="lrg-logo show logo" href="<?php echo home_url(); ?>">
                                    <img src="<?php echo $logo_src; ?>" alt="<?php echo get_option('theme_options_logo_alt'); ?>" class="img-responsives">
                                </a>
                                <a class="logo-scroll hide logo" href="<?php echo home_url(); ?>">
                                    <img src="<?php echo $logo_src_scroll; ?>" alt="<?php echo get_option('theme_options_logo_alt_scroll'); ?>" class="img-responsives">
                                </a> 
    <?php } else {
        ?>
                                <a class="logo" href="<?php echo home_url(); ?>">
                                    <img src="<?php echo $logo_src_scroll; ?>" alt="<?php echo get_option('theme_options_logo_alt_scroll'); ?>" class="img-responsives">
                                </a> 
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-sm-9">
                        <nav class="navbar navbar-default navbar-top">
                            <div class="navbar-header">
                                <?php
                                $logo_src_r = get_option('theme_options_logo_src_r');
                                ?>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand visible-xs" href="<?php echo home_url(); ?>"><img src="<?php echo $logo_src_r; ?>" alt="logo" class="img-responsive"></a>
                            </div>
                            <div class="navbar-collapse nav-collapse collapse" data-hover="dropdown" data-animations="zoomIn fadeInLeft fadeInUp zoomIn" id="main-nav" aria-expanded="true" role="navigation">
                                <?php
                                wp_nav_menu(
                                        array(
                                            'menu' => 'top_menu',
                                            'theme_location' => 'top_menu',
                                            'depth' => 2,
                                            'container' => 'div',
                                            //'container_class' => '',
                                            'menu_class' => 'nav navbar-nav navbar-right navbar-improve',
                                            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                            'walker' => new wp_bootstrap_navwalker()
                                        )
                                );
                                ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
