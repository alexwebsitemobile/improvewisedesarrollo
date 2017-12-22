<?php
get_header();
the_post();
?>

<div class="clearfix-page"></div>

<div class="container pdtb35">
    <div class="row">
        <div class="col-md-4 visible-sm visible-xs">
            <div class="post-content text-center mgb10 img-r">
                <?php the_post_thumbnail('full', array('class' => 'img-responsives')); ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="post-content post-content-gray">
                <div class="mgtb15">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="title-blue-md mgb10"><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>
                        <div class="col-xs-12">
                            <h2 class="title-blue-md mgb10">Awards any Certifications</h2>
                            <div class="awwards">
                                <?php
                                $images = rwmb_meta('awards_certifications_icon', 'type=image&size=full');
                                if (!empty($images)) {
                                    foreach ($images as $image) {
                                        echo '<a href="', esc_url($image['full_url']), '" title="', esc_attr($image['title']), '" rel="lightbox"><img style="padding:5px" src="', esc_url($image['url']), '"  alt="', esc_attr($image['alt']), '"></a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 hidden-sm hidden-xs">
            <div class="post-content text-center mgb10">
                <?php the_post_thumbnail('full', array('class' => 'img-responsives')); ?>
            </div>
        </div>

        <div class="col-md-8">
            <div class="post-content post-content-gray">
                <div class="mgtb15">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="title-blue-md mgb10">Consumer Reviews</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $reviews_contractor_page = rwmb_meta('reviews_contractor_page');
                            if (!empty($reviews_contractor_page)) {
                                foreach ($reviews_contractor_page as $group_reviews) {
                                    ?>
                                    <a href="<?php echo $group_reviews['url_reviews_contractor']; ?>" target="_blank" class="box-review text-center post-content">
                                        <div class="logo-contractor">
                                            <?php
                                            $image_ids = isset($group_reviews['logo_contractor_page']) ? $group_reviews['logo_contractor_page'] : array();
                                            foreach ($image_ids as $image_id) {
                                                $image = RWMB_Image_Field::file_info($image_id, array('size' => 'full'));
                                                echo '<img class="img-responsives mgb15" src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
                                            }
                                            ?>
                                        </div>
                                        <p class="name-review">
                                            <?php
                                            echo $group_reviews['name_review'];
                                            ?>
                                        </p>
                                        <p class="ranking-review">
                                            <b>
                                                <span>
                                                    <?php
                                                    echo $group_reviews['ranking_review'];
                                                    ?>
                                                </span>
                                            </b>
                                        </p>
                                        <p class="contractor-review">
                                            <?php
                                            echo $group_reviews['reviews_contractor'];
                                            ?>
                                        </p>
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-xs-12">
                <div class="post-content mgb10">
                    <h2 class="title-blue-md mgb10">Quotes</h2>
                    <div class="owl-carousel owl-theme">
                        <?php
                        $quotes_single = rwmb_meta('contractor_page_quotes');
                        if (!empty($quotes_single)) {
                            foreach ($quotes_single as $quotes) {
                                ?>
                                <div class="item">
                                    <p>
                                        <?php echo $quotes['contractor_page_quote']; ?>
                                    </p>
                                    <p style="color: #333366;">
                                        <b>- <?php echo $quotes['contractor_page_quote_title']; ?></b>
                                    </p>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="post-content post-content-gray">
                <div class="mgtb15">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="title-blue-md mgb10">Gallery</h2>
                            <div class="post-content">
                                <?php
                                $gallery_contractor_page_src = rwmb_meta('gallery_contractor_page');
                                $gallery_contractor_page = apply_filters('the_content', $gallery_contractor_page_src);
                                echo $gallery_contractor_page;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        autoHeight: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1
    });
</script>
<?php get_footer(); ?>