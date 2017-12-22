<div class="col-md-4 col-sm-6 mgb30">
    <a href="#" class="blog-compact-item-container" data-toggle="modal" data-target="#Modal<?php echo $post->post_name; ?>">
        <div class="blog-compact-item">
            <?php the_post_thumbnail(); ?>
            <div class="blog-compact-item-content">
                <h3><?php echo $post->post_title; ?></h3>
            </div>
        </div>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal<?php echo $post->post_name; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>
            </div>
            <div class="modal-body">
                <?php
                $info_box_01 = $post->post_content;
                $info_box_01_info = apply_filters('the_content', $info_box_01);
                echo $info_box_01_info;
                ?>
            </div>
        </div>
    </div>
</div>