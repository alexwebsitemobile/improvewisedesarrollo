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
                        <div class="col-md-offset-1 col-sm-10">
                            <?php the_content(); ?>
                            <?php
                            $steps_group = rwmb_meta('steps_ids_1');
                            if (!empty($steps_group)) {
                                foreach ($steps_group as $steps) {
                                    $position = $steps['step_position_1'];
                                    $column = $steps['column_step_1'];
                                    $laststep = $steps['last_step_1'];
                                    if ($position == 'left') {
                                        if ($column == 'one') {
                                            $position = 'col-sm-8 line-left';
                                        } else {
                                            $position = 'col-sm-12 line-left';
                                        }
                                        ?>
                                        <div class="<?php echo $position; ?> <?php
                                        if ($laststep == 'yes') {
                                            echo 'no-line';
                                        }
                                        ?> mgb30">
                                             <?php if ($column == 'one') {
                                                 ?>
                                                <div class="row">
                                                    <div class="col-sm-4 text-center-xs">
                                                        <?php
                                                        $image_ids = isset($steps['step_image_1']) ? $steps['step_image_1'] : array();
                                                        foreach ($image_ids as $image_id) {
                                                            $image = RWMB_Image_Field::file_info($image_id, array('size' => 'full'));
                                                            echo '<img class="img-responsives mgb15" src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-xs-12 text-center-xs">
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <div class="appnum numcount"><?php echo $steps['number_step_1']; ?></div>
                                                                    </div>
                                                                </div>
                                                                <div class="step-name">
                                                                    <?php echo $steps['title_step_1']; ?>
                                                                </div>
                                                            </div>
                                                            <div class="text-center-xs">
                                                                <?php
                                                                if ($column == 'one') {
                                                                    ?>
                                                                    <div class="col-xs-12">
                                                                        <div class="subtitle-step-name">
                                                                            <?php echo $steps['sub_title_step_1']; ?>
                                                                        </div>
                                                                        <div class="description-step">
                                                                            <?php echo $steps['description_step_1']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <div class="col-xs-12">
                                                                        <div class="subtitle-step-name">
                                                                            <?php echo $steps['sub_title_step_1']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="description-step">
                                                                            <?php echo $steps['description_left_1']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="description-step">
                                                                            <?php echo $steps['description_right_1']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else {
                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-3 text-center-xs">
                                                        <?php
                                                        $image_ids = isset($steps['step_image_1']) ? $steps['step_image_1'] : array();
                                                        foreach ($image_ids as $image_id) {
                                                            $image = RWMB_Image_Field::file_info($image_id, array('size' => 'full'));
                                                            echo '<img class="img-step img-responsives mgb15" src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-sm-9" style="padding-left:0;">
                                                        <div class="row">
                                                            <div class="col-xs-12 text-center-xs">
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <div class="appnum numcount"><?php echo $steps['number_step_1']; ?></div>
                                                                    </div>
                                                                </div>
                                                                <div class="step-name">
                                                                    <?php echo $steps['title_step_1']; ?>
                                                                </div>
                                                            </div>
                                                            <div class="text-center-xs">
                                                                <?php
                                                                if ($column == 'one') {
                                                                    ?>
                                                                    <div class="col-xs-12">
                                                                        <div class="subtitle-step-name">
                                                                            <?php echo $steps['sub_title_step_1']; ?>
                                                                        </div>
                                                                        <div class="description-step">
                                                                            <?php echo $steps['description_step_1']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <div class="col-xs-12">
                                                                        <div class="subtitle-step-name">
                                                                            <?php echo $steps['sub_title_step_1']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="description-step">
                                                                            <?php echo $steps['description_left_1']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="description-step">
                                                                            <?php echo $steps['description_right_1']; ?>
                                                                        </div>
                                                                    </div>

                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                    } elseif ($position == 'right') {
                                        if ($column == 'one') {
                                            $position = 'col-sm-offset-4 col-sm-8 line-right';
                                        } else {
                                            $position = 'col-sm-12 line-right';
                                        }
                                        ?>
                                        <div class="<?php echo $position; ?> <?php
                                        if ($laststep == 'yes') {
                                            echo 'no-line';
                                        }
                                        ?> mgb30">
                                            <div class="row">
                                                <div class="col-sm-4 visible-xs text-center-xs">
                                                    <?php
                                                    $image_ids = isset($steps['step_image_1']) ? $steps['step_image_1'] : array();
                                                    foreach ($image_ids as $image_id) {
                                                        $image = RWMB_Image_Field::file_info($image_id, array('size' => 'full'));
                                                        echo '<img class="img-responsives mgb15" src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-sm-8 text-right text-center-xs">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="row">
                                                                <div class="col-xs-12 text-right">
                                                                    <div class="appnum numcount text-right text-center-xs"><?php echo $steps['number_step_1']; ?></div>
                                                                </div>
                                                            </div>
                                                            <div class="step-name">
                                                                <?php echo $steps['title_step_1']; ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($column == 'one') {
                                                            ?>
                                                            <div class="col-xs-12">
                                                                <div class="subtitle-step-name">
                                                                    <?php echo $steps['sub_title_step_1']; ?>
                                                                </div>
                                                                <div class="description-step">
                                                                    <?php echo $steps['description_step_1']; ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="col-xs-12">
                                                                <div class="subtitle-step-name">
                                                                    <?php echo $steps['sub_title_step_1']; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="description-step">
                                                                    <?php echo $steps['description_left_1']; ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="description-step">
                                                                    <?php echo $steps['description_right_1']; ?>
                                                                </div>
                                                            </div>

                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 hidden-xs">
                                                    <?php
                                                    $image_ids = isset($steps['step_image_1']) ? $steps['step_image_1'] : array();
                                                    foreach ($image_ids as $image_id) {
                                                        $image = RWMB_Image_Field::file_info($image_id, array('size' => 'full'));
                                                        echo '<img class="img-responsives" src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="pd30">
                                        <?php
                                        $content_box_src = rwmb_meta('content_two_1');
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
        </div>
    </div>
</div>

<div class="container-gray pdtb50">
    <div class="container">
        <div class="row mgb30">
            <div class="col-xs-12 text-center">
                <h1 class="title-blue-md">Our Shingles</h1>
            </div>
        </div>
        <div class="row">
            <?php
            $taxonomia = array(
                'products-categories',
            );

            $args = array(
                'exclude' => array(178),
                'order' => 'DESC',
            );

            $tax_terms = get_terms($taxonomia, $args);
            $contador = 1;
            $id_shingle = 1;
            foreach ($tax_terms as $tax_term) {
                $termid = $tax_term->term_id;
                $attachment_id = (array) get_term_meta($termid, '_thumbnail_id', true);
                $image = wp_get_attachment_image_url(current($attachment_id), 'full');
                $term_link = get_term_link($tax_term);
                $price = get_term_meta($termid, 'products-price', true);
                $popular = get_term_meta($termid, 'show_most_popular', true);
                ?>
                <article class="text-center item-product col-md-3 col-sm-6">
                    <header>
                        <a href="#" id="article-<?php echo $tax_term->term_id; ?>" data-title="<?php echo $tax_term->slug ?>" class="term">
                            <?php if ($popular == 1) { ?>
                                <span class="most-popular">
                                    <i class="fa fa-star"></i> Most Popular
                                </span>
                            <?php } ?>
                            <?php if (!empty($image)) { ?>
                                <img class="img-responsives" src="<?php echo $image ?>" alt="<?php echo $tax_term->name ?>">  
                                <h4 class="title-min terms">
                                    <?php echo $tax_term->name; ?>
                                </h4>
                                <p>
                                    <?php echo $tax_term->description; ?>
                                </p>
                                <p style="font-weight: 600;color: #9c3;">
                                    <?php
                                    if ($price == 1) {
                                        ?>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <?php
                                    } elseif ($price == 2) {
                                        ?>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <?php
                                    } elseif ($price == 3) {
                                        ?>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <?php
                                    } elseif ($price == 4) {
                                        ?>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <?php
                                    } elseif ($price == 5) {
                                        ?>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                        <i class="fa fa-dollar" style="color: #9c3;"></i>
                                    <?php } ?>
                                </p>
                            <?php } else { ?>
                                <img class="img-responsives" src="<?php bloginfo('template_url'); ?>/images/not-category-image.png" alt="<?php echo $tax_term->name ?>">  
                                <h4 class="title-min terms">
                                    <?php echo $tax_term->name; ?>
                                </h4>
                                <p>
                                    <?php echo $tax_term->description; ?>
                                </p>
                            <?php } ?>
                        </a>
                    </header>
                </article>
                <?php
                $contador++;
                $id_shingle++;
            }
            ?>
        </div>
    </div>
</div>
<script>
    jQuery('.term').on('click', function (e) {
        e.preventDefault();
        var getId = jQuery(this).attr('id');
        window.location.replace("<?php echo home_url(); ?>?id=" + getId + "#buy-your-roof-container");
    });

</script>
<?php get_footer(); ?>