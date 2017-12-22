<?php
$name = get_option('theme_options_name');
$addr = get_option('theme_options_addr');
$city = get_option('theme_options_city');
$state = get_option('theme_options_state');
$zip = get_option('theme_options_zip');
$country = get_option('theme_options_country');
$tel = get_option('theme_options_tel');
$mail = get_option('theme_options_email');
?>

<footer itemscope itemprop="http://schema.org/WPFooter" class="page-footer">
    <div class="container brdb">
        <div class="row">
            <div class="col-sm-3">
                <div class="box-widget text-center-xs">
                    <h3>
                        Useful Links
                    </h3>
                    <?php
                    wp_nav_menu(array('theme_location' => 'footer-menu'));
                    ?>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-widget text-center-xs">
                    <h3>
                        Contact Us
                    </h3>
                    <address>
                        <p><a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a></p>
                        <p><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></p>
                    </address>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-widget text-center-xs">
                    <?php
                    wp_nav_menu(array('theme_location' => 'extra-menu'));
                    ?>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="text-center-xs">
                    <?php if (is_front_page()) { ?>
                        <a id="buy-anchor" href="#buy-your-roof-container" class="btn btn-green btn-lg">
                        <?php } else { ?>
                            <a href="<?php echo home_url(); ?>#buy-your-roof-container" class="btn btn-green btn-lg btn-full-width">
                            <?php } ?>
                            Get Your Free Quotes
                        </a>
                </div>
                <div class="social text-center">
                    <?php
                    $facebook = get_option('theme_options_facebook');
                    $twitter = get_option('theme_options_twitter');
                    $googleplus = get_option('theme_options_googleplus');
                    $youtube = get_option('theme_options_youtube');
                    $linkedin = get_option('theme_options_linkedin');
                    $pinterest = get_option('theme_options_pinterest');
                    $tumblr = get_option('theme_options_tumblr');
                    $rss = get_option('theme_options_rss');
                    ?>
                    <?php if (!empty($facebook)) { ?>
                        <a target="_blank" href="<?php echo $facebook; ?>">
                            <i class="fa fa-facebook social-footer" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                    <?php if (!empty($googleplus)) { ?>
                        <a target="_blank" href="<?php echo $googleplus; ?>">
                            <i class="fa fa-google-plus social-footer" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                    <?php if (!empty($twitter)) { ?>
                        <a target="_blank" href="<?php echo $twitter; ?>">
                            <i class="fa fa-twitter social-footer" aria-hidden="true"></i>
                        </a>
                    <?php } ?>

                    <?php if (!empty($youtube)) { ?>
                        <a target="_blank" href="<?php echo $youtube; ?>">
                            <i class="fa fa-youtube-play social-footer" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                    <?php if (!empty($linkedin)) { ?>
                        <a target="_blank" href="<?php echo $linkedin; ?>">
                            <i class="fa fa-linkedin social-footer" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                    <?php if (!empty($pinterest)) { ?>
                        <a target="_blank" href="<?php echo $pinterest; ?>">
                            <i class="fa fa-pinterest social-footer" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                    <?php if (!empty($tumblr)) { ?>
                        <a target="_blank" href="<?php echo $tumblr; ?>">
                            <i class="fa fa-tumblr social-footer" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                    <?php if (!empty($rss)) { ?>
                        <a target="_blank" href="<?php echo $rss; ?>">
                            <i class="fa fa-rss social-footer" aria-hidden="true"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</footer>
