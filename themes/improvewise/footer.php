<?php
get_template_part('templates/footer');
wp_footer();
do_action('after_main_content');
?>
<!-- Latest compiled and minified JavaScript -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js" type="text/javascript"></script>
<?php
if (is_front_page()) {
    ?>
    <script>
        jQuery('.term').on('click', function (e) {
            e.preventDefault();
            var href = jQuery(this).attr('href');
            var title = jQuery(this).attr('title');
            value = title;
            jQuery.get(href, {ajax: 1}, function (html) {
                jQuery('.ajax-response').html(html);
            });
            $(this).toggleClass('active-item');
            $('#alert-product').addClass('visible fadeInUp');
            $('#alert-product span').html(title);
            $('.ajax-response span').html('Loading colors...');
            $('textarea#MSM_custom_Interests').val("Shingle: " + title);
            $('span#shingle-name').html(title);
            $('span#shingle-name-url').html(title);
            $('span#color-name').html('Select a color');
            $('#alert-color').addClass('hidden');
            $('#alert-color').removeClass('visible-color fadeInUp');
            $("textarea#MSM_custom_Interests").prop('disabled', false);
            $('#img-color-front').attr('src', '<?php echo content_url(); ?>/uploads/2017/09/Timberline_American_Harvest_Golden_Harvest.png');
            $('#ModalShingle').modal('hide');
            $('#ModalColor').modal('show');
            $('body').addClass("intro");
            titleshingle = title;
        });
        $("textarea#MSM_custom_Interests").prop('disabled', true);


        jQuery('#printPDF').on('click', function (e) {
            e.preventDefault();
            var shinglename = titleshingle;
            var colortitle = titlecolor;
            var imgs = srcimg;
            window.location.replace("<?php echo home_url(); ?>/print-pdf?shingle=" + shinglename + "&color=" + colortitle + '&colorimage=' + imgs);
        });


    </script>
    <?php
}
?>
<script>
    //scroll

    $("#buy-anchor").click(function (e) {
        e.preventDefault();
        $('html,body').animate({scrollTop: $("#buy-your-roof-container").offset().top - 115});
    });

    (function ($) {
        var jump = function (e) {
            if (e) {
                e.preventDefault();
                var target = $(this).attr("href");
            } else {
                var target = location.hash;
            }
            $('html,body').animate({
                scrollTop: $(target).offset().top - 140
            }, 1000, function () {
                location.hash = target;
            });
        };



    })(jQuery);
</script>
</body>
</html>
