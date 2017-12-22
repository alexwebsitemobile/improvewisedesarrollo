<?php
get_header();
$gallery_info = get_page_by_path('gallery-info');
$gallery_img_src = get_post_meta($gallery_info->ID, 'gallery_icon', true);
$gallery_img = wp_get_attachment_image_src($gallery_img_src, 'full');
?>

<div class="clearfix-page"></div>

<div class="post-content text-center pdt35 mgb10">
    <img src="<?php echo $gallery_img[0]; ?>" width="<?php echo $gallery_img[1]; ?>" height="<?php echo $gallery_img[2]; ?>" class="img-responsives" />
</div>

<div class="container pdtb35">
    <div class="row mgb30">
        <div class="col-xs-12 text-center">
            <h1 class="title-blue-md">Gallery</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="post-content post-content-gray">
                <div class="mgb30">
                    <div class="row">
                        <?php
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type' => 'gallery',
                        );
                        $gallery_post = get_posts($args);
                        ?>
                        <?php
                        foreach ($gallery_post as $post) : setup_postdata($post);
                            get_template_part('templates/loop-gallery');
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_template_part('template-faqs'); ?>

<?php get_footer(); ?>