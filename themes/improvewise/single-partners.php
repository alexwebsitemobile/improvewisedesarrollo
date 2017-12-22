<?php get_header(); ?>

<div class="clearfix-page"></div>

<div class="container-gray pdtb50">
    <div class="container">
        <div class="row">
            <?php
            the_post();
            ?>
            <div class="col-md-offset-1 col-md-10 col-sm-12">
                <article class="thumbnail blog-box clearfix pd30">
                    <div class="text-center">
                        <h1 class="title-blue-lg mgb10"><?php the_title(); ?></h1>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('single-blog', array('class' => 'img-responsive mgb20')); ?>
                    <?php endif; ?>
                    <!-- detail -->
                    <div class="caption detail post-content">
                        <!-- paragraph -->
                        <?php the_content(); ?>
                        <div class="clearfix"></div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>