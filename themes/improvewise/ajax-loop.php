<div class="row">
    <?php
    $contador = 1;
    while (have_posts()) {
        the_post();
        ?>
        <article <?php post_class('col-sm-6 col-xs-12 post-loop text-center item-product') ?>>
            <header>
                <a id="elemento-<?php echo $contador; ?>" onclick="showImg(this)" data-image="<?php echo $contador; ?>" href="#" class="term-items" title="<?php the_title(); ?>" title="<?php the_title(); ?>">
                    <?php
                    $thumbnail = get_the_post_thumbnail_url();
                    if (!empty($thumbnail)) {
                        ?>
                        <img src="<?php echo $thumbnail; ?>" class="img-responsives-75" id="img-<?php echo $contador; ?>" data-image="img-<?php echo $contador; ?>" alt="<?php the_title(); ?>">
                    <?php } ?>
                    <h4 class="title-min terms">
                        <?php the_title(); ?>
                    </h4>
                </a> 
            </header>
        </article>
        <?php
        $contador++;
    }
    ?>
</div>

<script>
    function showImg(imgUrl) {
        var imgData = imgUrl.getAttribute("data-image");
        var img = document.getElementById('img-' + imgData);
        var imgAttr = img.getAttribute('src');
        $('#img-color-front').attr('src', imgAttr);
        srcimg = imgAttr;
    }

    jQuery('.term-items').on('click', function (e) {
        e.preventDefault();
        $('#alert-color').removeClass('hidden');
        $('#alert-color').addClass('visible-color fadeInUp');
        var title = jQuery(this).attr('title');
        value2 = "Shingle: " + value + " - Color: " + title;
        $('#alert-color span').html(title);
        $('textarea#MSM_custom_Interests').val(value2);
        $('span#color-name').html(title);
        <?php
            $_SESSION["color"] = title;
        ?>
        $("a#btn-color-enb-dsb").prop('disabled', false);
        $('#ModalColor').modal('hide');
        $("body").removeClass('intro modal-open');
        titlecolor = title;
        $("#showprintpdf").css('display', 'block');
        
    });

    $('#ModalColor').on('hidden.bs.modal', function (e) {
        $('body').addClass('no-padding');
    });

</script>