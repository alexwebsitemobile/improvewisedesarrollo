<?php
get_header();
the_post();
?>
<?php get_template_part('ajax-loop'); ?>

<?php putRevSlider('cleanslider'); ?>

<?php
$show_icons_home = rwmb_meta('show_icons_home');
if (!$show_icons_home == 1) {
    ?>
    <div class="container-white pdtb50">
        <div class="container">
            <div class="row">
                <?php
                $icons_home = rwmb_meta('icons_home');
                $contador_ids = 1;
                if (!empty($icons_home)) {
                    foreach ($icons_home as $icons) {
                        ?>
                        <div class="col-md-3 col-sm-6 text-center">
                            <?php
                            $urlicon = $icons['icon_home_url'];
                            ?>
                            <a id="icon-<?php echo $contador_ids; ?>" data-icon="<?php echo $contador_ids; ?>" href="<?php echo home_url($urlicon); ?>" class="icon-link">
                                <?php
                                $image_ids = isset($icons['icon_home_image']) ? $icons['icon_home_image'] : array();
                                foreach ($image_ids as $image_id) {
                                    $image = RWMB_Image_Field::file_info($image_id, array('size' => 'full'));
                                    echo '<img class="img-responsives mgb15" src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
                                }
                                ?>
                                <h3 class="title-blue-md">                            
                                    <?php echo $icons['icon_home_title']; ?>
                                </h3>
                            </a>
                        </div>
                        <?php
                        $contador_ids++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script>

        $("#icon-1").click(function (e) {
            e.preventDefault();
            $('html,body').animate({scrollTop: $("#icon-1-container").offset().top - 115});
        });

        $("#icon-2").click(function (e) {
            e.preventDefault();
            $('html,body').animate({scrollTop: $("#buy-your-roof-container").offset().top - 115});
        });

        $("#icon-4").click(function (e) {
            e.preventDefault();
            $('html,body').animate({scrollTop: $("#partners-container").offset().top - 115});
        });


    </script>
<?php } ?>

<div class="container-white pdtb80">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 text-center">
                <?php
                $vetted_professionals_image = rwmb_meta('vetted_professionals_image', 'type=image&size=FULL');
                if (!empty($vetted_professionals_image)) {
                    foreach ($vetted_professionals_image as $image) {
                        echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                    }
                }
                ?>
                <h3 class="title-blue-md">
                    <?php echo rwmb_meta('vetted_professionals'); ?>
                </h3>
                <div class="post-content text-left">
                    <p>
                        <?php echo rwmb_meta('vetted_professionals_description'); ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <?php
                $quick_response_image = rwmb_meta('quick_response_image', 'type=image&size=FULL');
                if (!empty($quick_response_image)) {
                    foreach ($quick_response_image as $image) {
                        echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                    }
                }
                ?>
                <h3 class="title-blue-md">
                    <?php echo rwmb_meta('quick_response'); ?>
                </h3>
                <div class="post-content text-left">
                    <p>
                        <?php echo rwmb_meta('quick_response_description'); ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <?php
                $best_pricing_image = rwmb_meta('best_pricing_image', 'type=image&size=FULL');
                if (!empty($best_pricing_image)) {
                    foreach ($best_pricing_image as $image) {
                        echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                    }
                }
                ?>
                <h3 class="title-blue-md">
                    <?php echo rwmb_meta('best_pricing'); ?>
                </h3>
                <div class="post-content text-left">
                    <p>
                        <?php echo rwmb_meta('best_pricing_description'); ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <?php
                $guaranteed_image = rwmb_meta('guaranteed_image', 'type=image&size=FULL');
                if (!empty($guaranteed_image)) {
                    foreach ($guaranteed_image as $image) {
                        echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                    }
                }
                ?>
                <h3 class="title-blue-md">
                    <?php echo rwmb_meta('guaranteed'); ?>
                </h3>
                <div class="post-content text-left">
                    <p>
                        <?php echo rwmb_meta('guaranteed_description'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$video = rwmb_meta('video_home_content');
if (!empty($video)) {
    ?>
    <div class="container-gray pdtb50">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="video-img-container-d">
                        <p>
                            <?php
                            $images_vimeo = rwmb_meta('image_video_home_vimeo', 'type=image&size=FULL'); // Prior to 4.8.0
                            if (!empty($images_vimeo)) {
                                foreach ($images_vimeo as $image) {
                                    echo '<img style="padding:5px" src="', esc_url($image['url']), '"  alt="', esc_attr($image['alt']), '">';
                                }
                            }
                            ?>
                            <iframe class="video-iframe-d" src="https://player.vimeo.com/video/<?php echo $video; ?>" width="300" height="150" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div id="icon-1-container" class="container-white pdtb80">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center mgb60">
                <?php
                $images = rwmb_meta('our_process_icon', 'type=image&size=FULL');
                if (!empty($images)) {
                    foreach ($images as $image) {
                        echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                    }
                }
                ?>
                <h3 class="title-blue-lg">
                    <?php echo rwmb_meta('our_process_title'); ?>
                </h3>
            </div>
            <div class="col-sm-offset-1 col-sm-10">
                <?php get_template_part('templates/our-process'); ?>
            </div>
        </div>
    </div>
</div>

<div id="buy-your-roof-container" class="container-gray pdtb50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center mgb60">
                <?php
                $buyRoof = rwmb_meta('buy_roof_icon', 'type=image&size=FULL');
                if (!empty($buyRoof)) {
                    foreach ($buyRoof as $image) {
                        echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                    }
                }
                ?>
                <h3 class="title-blue-lg">
                    <?php echo rwmb_meta('buy_roof_title'); ?>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 tg-verticalmiddle">
                <div class="post-content pdr40-d">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-sm-6 tg-verticalmiddle">
                <div class="post-content">
                    <div class="container-white-with-show">
                        <div class="mgb30" id="contet-form">
                            <?php
                            $form_content_src = rwmb_meta('form_content_home');
                            $form_content = apply_filters('the_content', $form_content_src);
                            echo $form_content;
                            ?>
                        </div>
                        <?php get_template_part('templates/marketsharp'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="partners-container" class="container-white pdtb80">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center mgb30">
                <?php
                $partners = rwmb_meta('partners_icon', 'type=image&size=FULL');
                if (!empty($partners)) {
                    foreach ($partners as $image) {
                        echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                    }
                }
                ?>
                <h3 class="title-blue-lg">
                    <?php echo rwmb_meta('partners_title'); ?>
                </h3>
            </div>
        </div>
        <div class="row">
            <?php
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'partners',
            );
            $partners_post = get_posts($args);
            ?>
            <?php foreach ($partners_post as $post) : setup_postdata($post); ?>

                <div class="col-md-offset-2 col-md-8 mgb30">
                    <article class="blog-box clearfix">
                        <div class="col-sm-6 tg-verticalmiddle text-center-xs">
                            <?php if (has_post_thumbnail()) { ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('full', array('class' => 'img-responsives pdtb15 ')); ?>
                                </a>
                            <?php } else { ?>  
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <img src="http://34.225.96.83:9007/wp-content/uploads/2017/07/blog_no-image.jpg" class="img-responsive pdtb15">
                                </a>

                            <?php } ?>
                        </div>
                        <div class="col-sm-6 tg-verticalmiddle">
                            <!-- detail -->
                            <div class="caption detail">
                                <!-- paragraph -->
                                <div class="excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="clearfix"></div>
                                <!-- Btn -->
                                <div class="text-right-xs">
                                    <a href="<?php the_permalink(); ?>" class="btn button-sm button-theme ">Read More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<div class="container-gray pdtb80 relative">
    <span class="icon-top"><i class="fa fa-quote-left"></i></span>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="post-content"><?php
                    $box_additional_content_src = rwmb_meta('box_additional_content_home');
                    $box_additional_content = apply_filters('the_content', $box_additional_content_src);
                    echo $box_additional_content;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>