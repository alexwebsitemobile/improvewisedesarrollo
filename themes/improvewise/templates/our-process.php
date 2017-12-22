<?php
$steps_group = rwmb_meta('steps_ids');
if (!empty($steps_group)) {
    foreach ($steps_group as $steps) {
        $position = $steps['step_position'];
        $column = $steps['column_step'];
        $laststep = $steps['last_step'];
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
            ?> mgb60">
                 <?php if ($column == 'one') {
                     ?>
                    <div class="row">
                        <div class="col-sm-4 text-center-xs">
                            <?php
                            $image_ids = isset($steps['step_image']) ? $steps['step_image'] : array();
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
                                            <div class="numcount"><?php echo $steps['number_step']; ?></div>
                                        </div>
                                    </div>
                                    <div class="step-name">
                                        <?php echo $steps['title_step']; ?>
                                    </div>
                                </div>
                                <div class="text-center-xs">
                                    <?php
                                    if ($column == 'one') {
                                        ?>
                                        <div class="col-xs-12">
                                            <div class="subtitle-step-name">
                                                <?php echo $steps['sub_title_step']; ?>
                                            </div>
                                            <div class="description-step">
                                                <?php echo $steps['description_step']; ?>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-xs-12">
                                            <div class="subtitle-step-name">
                                                <?php echo $steps['sub_title_step']; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="description-step">
                                                <?php echo $steps['description_left']; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="description-step">
                                                <?php echo $steps['description_right']; ?>
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
                            $image_ids = isset($steps['step_image']) ? $steps['step_image'] : array();
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
                                            <div class="appnum numcount"><?php echo $steps['number_step']; ?></div>
                                        </div>
                                    </div>
                                    <div class="step-name">
                                        <?php echo $steps['title_step']; ?>
                                    </div>
                                </div>
                                <div class="text-center-xs">
                                    <?php
                                    if ($column == 'one') {
                                        ?>
                                        <div class="col-xs-12">
                                            <div class="subtitle-step-name">
                                                <?php echo $steps['sub_title_step']; ?>
                                            </div>
                                            <div class="description-step">
                                                <?php echo $steps['description_step']; ?>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-xs-12">
                                            <div class="subtitle-step-name">
                                                <?php echo $steps['sub_title_step']; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="description-step">
                                                <?php echo $steps['description_left']; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="description-step">
                                                <?php echo $steps['description_right']; ?>
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
            ?> mgb60">
                <div class="row">
                    <div class="col-sm-4 visible-xs text-center-xs">
                        <?php
                        $image_ids = isset($steps['step_image']) ? $steps['step_image'] : array();
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
                                        <div class="appnum numcount text-right text-center-xs"><?php echo $steps['number_step']; ?></div>
                                    </div>
                                </div>
                                <div class="step-name">
                                    <?php echo $steps['title_step']; ?>
                                </div>
                            </div>
                            <?php
                            if ($column == 'one') {
                                ?>
                                <div class="col-xs-12">
                                    <div class="subtitle-step-name">
                                        <?php echo $steps['sub_title_step']; ?>
                                    </div>
                                    <div class="description-step">
                                        <?php echo $steps['description_step']; ?>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="col-xs-12">
                                    <div class="subtitle-step-name">
                                        <?php echo $steps['sub_title_step']; ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="description-step">
                                        <?php echo $steps['description_left']; ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="description-step">
                                        <?php echo $steps['description_right']; ?>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-4 hidden-xs">
                        <?php
                        $image_ids = isset($steps['step_image']) ? $steps['step_image'] : array();
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