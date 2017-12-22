<?php get_header(); ?>

<div class="clearfix-page"></div>

<div class="container-gray">

    <div class="container">
        <div class="row pdtb30">
            <div class="col-xs-12 text-center">
                <h1 class="title-blue-md">Contractors</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 mgb30">
                                <article class="thumbnail blog-box clearfix">
                                    <div class="col-xs-12 block-image-xs">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail('full', array('class' => 'img-responsive pdtb15')); ?>
                                            </a>
                                        <?php } else { ?>  
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <img src="http://34.225.96.83:9007/wp-content/uploads/2017/07/blog_no-image.jpg" class="img-responsive pdtb15">
                                            </a>

                                        <?php } ?>
                                    </div>
                                    <div class="col-xs-12">
                                        <!-- detail -->
                                        <div class="caption detail">
                                            <!-- Main title -->
                                            <div>
                                                <h1 title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                            </div>
                                            <!-- paragraph -->
                                            <div class="excerpt-blog mgb10">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <div class="clearfix"></div>
                                            <!-- Btn -->
                                            <div>
                                                <a href="<?php the_permalink(); ?>" class="btn button-sm button-theme">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>