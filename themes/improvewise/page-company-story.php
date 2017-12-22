<?php
get_header();
the_post();
?>

<div class="clearfix-page"></div>

<div class="post-content text-center pdt35 mgb10">
    <?php the_post_thumbnail('full', array('class' => 'img-responsives')); ?>
</div>

<div class="container pdtb35">
    <div class="row mgb30">
        <div class="col-xs-12 text-center">
            <h1 class="title-blue-md"><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="post-content post-content-gray">
                <div class="mgb30">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php
                $content_steps_src = rwmb_meta('content_steps_company');
                $content_steps = apply_filters('the_content', $content_steps_src);
                echo $content_steps;
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="mgb30 post-content">
                            <?php
                            $content_box_src = rwmb_meta('content_two_company');
                            $content_box = apply_filters('the_content', $content_box_src);
                            echo $content_box;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_template_part('template-contact-us'); ?>

<?php
$hide_our_team = rwmb_meta('show_our_team');
if (!$hide_our_team == 1) {
    ?>
<div id="our-team-container" class="container-white pdtb80">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <?php
                    $ourTeam = rwmb_meta('our_team_icon', 'type=image&size=FULL');
                    if (!empty($ourTeam)) {
                        foreach ($ourTeam as $image) {
                            echo '<img style="margin-bottom:10px;" src="', esc_url($image['full_url']), '"  alt="', esc_attr($image['alt']), '">';
                        }
                    }
                    ?>
                    <h3 class="title-blue-lg">
                        <?php echo rwmb_meta('our_team_title'); ?>
                    </h3>
                    <div class="post-content">
                        <div class="video-img-container text-center">
                            <p>
                                <img class="alignnone size-full wp-image-359" src="<?php bloginfo('template_url'); ?>/images/tablet.png" alt="View Video" /><br />
                                <iframe class="video-iframe" src="https://www.youtube.com/embed/<?php echo rwmb_meta('our_team_video'); ?>" width="300" height="150" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                            </p>
                        </div>
                        <?php
                        $our_Team_content_src = rwmb_meta('our_Team_content');
                        $our_Team_content = apply_filters('the_content', $our_Team_content_src);
                        echo $our_Team_content;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>