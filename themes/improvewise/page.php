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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>