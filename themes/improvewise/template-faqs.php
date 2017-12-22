<?php
$faqs_page = get_page_by_path('faqs');
$video_code = get_post_meta($faqs_page->ID, 'faqs_video', true);
$icon_faqs_src = get_post_meta($faqs_page->ID, 'faqs_icon', true);
$icon_faqs = wp_get_attachment_image_src($icon_faqs_src, 'full');
?>

<div id="faqs-container" class="container-gray">
    <div class="post-content text-center pdt35 mgb10">
        <img src="<?php echo $icon_faqs[0]; ?>" width="<?php echo $icon_faqs[1]; ?>" height="<?php echo $icon_faqs[2]; ?>" class="img-responsives" />
    </div>

    <div class="container pdtb35">
        <div class="row mgb30">
            <div class="col-xs-12 text-center">
                <h1 class="title-blue-md">FAQ's</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="post-content post-content-gray">
                    <div class="video-img-container text-center">
                        <p>
                            <img class="alignnone size-full wp-image-359" src="<?php bloginfo('template_url'); ?>/images/tablet.png" alt="View Video" /><br />
                            <iframe class="video-iframe" src="https://www.youtube.com/embed/<?php echo $video_code; ?>" width="300" height="150" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <?php
                $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'faqs',
                );
                $faqs = get_posts($args);
                ?>

                <div class="panel">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php
                        foreach ($faqs as $post) : setup_postdata($post);
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading<?php echo $post->ID; ?>">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $post->ID; ?>" aria-expanded="true" aria-controls="collapseOne">
                                            <?php echo $post->post_title; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse<?php echo $post->ID; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $post->ID; ?>">
                                    <div class="panel-body">
                                        <div class="description-step">
                                            <?php echo $post->post_content; ?>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>