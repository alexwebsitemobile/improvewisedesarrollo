<?php
include JPB_THEME_PATH . '/dompdf/dompdf_config.inc.php';
spl_autoload_register('DOMPDF_autoload');
ob_start();
$varShingle = htmlspecialchars($_GET["shingle"]);
$varColor = htmlspecialchars($_GET["color"]);
$colorimage = htmlspecialchars($_GET["colorimage"]);
?>
<html>
    <head>
        <meta charset="<?php bloginfo('charset') ?>" />
    </head>
    <body>
        <div style="text-align: center;margin-top: 80px;">
            <?php
            $logo_src = get_option('theme_options_logo_src_scroll');
            ?>
            <div style="margin-bottom: 15px;">
                <img style="max-width:120px;height: auto;" src="<?php echo $logo_src; ?>" alt="<?php echo get_option('theme_options_logo_alt'); ?>">
            </div>
            <h1 style="color: #336;font-family: Lato,sans-serif; font-size: 30px; font-weight: 600;margin-bottom:50px;">BUY YOUR ROOF ONLINE. <br>RIGHT NOW.</h1>
            <img src="<?php echo $colorimage; ?>">
            <h2 style="color: #A0A0A0;font-family: Lato,sans-serif; font-size: 22px; font-weight: 600;"><?php echo $varColor; ?></h2>
            <h2 style="color: #A0A0A0;font-family: Lato,sans-serif; font-size: 18px; font-weight: 300;"><?php echo $varShingle; ?></h2>
            <p style="color: #A0A0A0;font-family: Lato,sans-serif; font-size: 14px; font-weight: 300; text-align: center;">
                At ImproveWise, we’ve simplified home improvement.
            </p>
            <p style="color: #A0A0A0;font-family: Lato,sans-serif; font-size: 14px; font-weight: 300; text-align: center;">
                No more inconvenient appointments. No more high-pressure sales in your home.
            </p>
            <p style="color: #A0A0A0;font-family: Lato,sans-serif; font-size: 14px; font-weight: 300; text-align: center;">
                Thanks to our simple 3-step process, you can customize and order your new roof online. Right now.
            </p>
            <p style="color: #A0A0A0;font-family: Lato,sans-serif; font-size: 14px; font-weight: 300; text-align: center;">
                Using state-of-the-art aerial imagery and our proprietary technology, we will give you written bids from up to three, top-rated, manufacturer-certified contractors.
            </p>
            <p style="color: #A0A0A0;font-family: Lato,sans-serif; font-size: 14px; font-weight: 300; text-align: center;">
                Ready to experience home improvement the way it should be?
            </p>

        </div>
        <div style="height: 50px"></div>
        <div style="background-color:#336; color :#FFF;font-family: Lato,sans-serif; font-size: 14px;width: 100%;padding-top: 15px;padding-bottom: 15px;text-align: center;">
            © 2017 All rights Reserved - Improvewise
        </div>
    </body>
</html>
<?php
$content = ob_get_clean();

$dompdf = new DOMPDF();
$dompdf->set_paper('letter', 'portrait');
$dompdf->load_html($content);
$dompdf->render();
$dompdf->stream("a.pdf");
