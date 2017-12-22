<?php

/** Constants */
defined('THEME_URI') || define('THEME_URI', get_template_directory_uri());
defined('THEME_PATH') || define('THEME_PATH', realpath(__DIR__));

include_once THEME_PATH . '/includes/functions.php';
require_once THEME_PATH . '/includes/register-sidebar.php';

// Constants
defined('DISALLOW_FILE_EDIT') || define('DISALLOW_FILE_EDIT', FALSE);
defined('TEXT_DOMAIN') || define('TEXT_DOMAIN', 'jp-basic');
define('JPB_THEME_PATH', realpath(__DIR__));


//include_once __DIR__ . '/includes/register-script.php';
include_once __DIR__ . '/includes/register-script-local.php';
include_once __DIR__ . '/includes/register-style.php';

//include_once __DIR__ . '/includes/register-style-local.php';

/*
  Favicon Admin
 */

function favicon() {
    echo '<link rel="shortcut icon" href="', get_template_directory_uri(), '/favicon.ico" />', "\n";
}

add_action('admin_head', 'favicon');

/**
 * Add scripts and styles to all Admin pages
 */
function jscustom_admin_scripts() {
    wp_enqueue_media();
    wp_register_script('custom-upload', get_template_directory_uri() . '/js/media-uploader.js', array('jquery'));
    wp_enqueue_script('custom-upload');
}

add_action('admin_print_scripts', 'jscustom_admin_scripts');

add_filter('update_footer', 'right_admin_footer_text_output', 11);

function right_admin_footer_text_output($text) {
    $text = 'Develop by <a href="https://www.sourcemeridian.com" target="_blank">Source Meridian</a>';
    return $text;
}

//Theme settings
require(get_template_directory() . '/inc/theme-options.php');

add_action('wp_enqueue_scripts', function () {

    /* Styles */
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('animate');
    wp_enqueue_style('hover');
    wp_enqueue_style('font-awesome');
    // Theme
    wp_enqueue_style('main-theme');

    /* Scripts */
    wp_enqueue_script('modernizr');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('jquery-form');

    // Bootstrap Alerts
    wp_register_script('bootstrap-alerts', apply_filters('js_cdn_uri', THEME_URI . '/js/bootstrap-alerts.min.js', 'bootstrap-alerts'), array('jquery', 'bootstrap'), NULL, TRUE);
    wp_enqueue_script('bootstrap-alerts');

    // Add defer atribute
    do_action('defer_script', array('jquery-form', 'bootstrap-alerts'));

    // Bootstrap complemetary text align
    wp_register_style('bs-text-align', THEME_URI . '/css/bootstrap-text-align.min.css', array('bootstrap'), '1.0');
    wp_enqueue_style('bs-text-align');

    // Wordpress Core
    wp_register_style('wordpress-core', THEME_URI . '/css/wordpress-core.min.css', array('bootstrap', 'bs-text-align'), '1.0');
    wp_enqueue_style('wordpress-core');

    if (is_child_theme()) {
        // Theme
        wp_register_style('theme', get_stylesheet_uri(), array('animate'), '1.0');
        wp_enqueue_style('theme');
    }
});

include_once __DIR__ . '/includes/theme-features.php';

/**
 * Encoded Mailto Link
 *
 * Create a spam-protected mailto link written in Javascript
 *
 * @param	string	the email address
 * @param	string	the link title
 * @param	mixed	any attributes
 * @return	string
 */
function safe_mailto($email, $title = '', $attributes = '') {
    $title = (string) $title;

    if ($title === '') {
        $title = $email;
    }

    $x = str_split('<a href="mailto:', 1);

    for ($i = 0, $l = strlen($email); $i < $l; $i++) {
        $x[] = '|' . ord($email[$i]);
    }

    $x[] = '"';

    if ($attributes !== '') {
        if (is_array($attributes)) {
            foreach ($attributes as $key => $val) {
                $x[] = ' ' . $key . '="';
                for ($i = 0, $l = strlen($val); $i < $l; $i++) {
                    $x[] = '|' . ord($val[$i]);
                }
                $x[] = '"';
            }
        } else {
            for ($i = 0, $l = strlen($attributes); $i < $l; $i++) {
                $x[] = $attributes[$i];
            }
        }
    }

    $x[] = '>';

    $temp = array();
    for ($i = 0, $l = strlen($title); $i < $l; $i++) {
        $ordinal = ord($title[$i]);

        if ($ordinal < 128) {
            $x[] = '|' . $ordinal;
        } else {
            if (count($temp) === 0) {
                $count = ($ordinal < 224) ? 2 : 3;
            }

            $temp[] = $ordinal;
            if (count($temp) === $count) {
                $number = ($count === 3) ? (($temp[0] % 16) * 4096) + (($temp[1] % 64) * 64) + ($temp[2] % 64) : (($temp[0] % 32) * 64) + ($temp[1] % 64);
                $x[] = '|' . $number;
                $count = 1;
                $temp = array();
            }
        }
    }

    $x[] = '<';
    $x[] = '/';
    $x[] = 'a';
    $x[] = '>';

    $x = array_reverse($x);

    $output = "<script type=\"text/javascript\">\n"
            . "\t//<![CDATA[\n"
            . "\tvar l=new Array();\n";

    for ($i = 0, $c = count($x); $i < $c; $i++) {
        $output .= "\tl[" . $i . "] = '" . $x[$i] . "';\n";
    }

    $output .= "\n\tfor (var i = l.length-1; i >= 0; i=i-1) {\n"
            . "\t\tif (l[i].substring(0, 1) === '|') document.write(\"&#\"+unescape(l[i].substring(1))+\";\");\n"
            . "\t\telse document.write(unescape(l[i]));\n"
            . "\t}\n"
            . "\t//]]>\n"
            . '</script>';

    return $output;
}

require_once __DIR__ . '/admin/admin.php';

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

class Custom_Walker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat("\t", $depth) : '' ); // code indent
        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >= 2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));

        // passed classes
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        if (!in_array($item->object, array('custom'))) {
            $post_data = get_post($item->object_id);
            $classes[] = $post_data->post_type . '-' . $post_data->post_name;
        }

        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

        // build html
        $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // link attributes
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf('%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s', $args->before, $attributes, $args->link_before, apply_filters('the_title', $item->title, $item->ID), $args->link_after, $args->after
        );

        // build html
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

// Here go metabox

function rw_register_meta_box() {
    if (!class_exists('RW_Meta_Box') or ! is_admin())
        return;
    $post_ID = !empty($_POST['post_ID']) ?
            $_POST['post_ID'] :
            (!empty($_GET['post']) ? $_GET['post'] : FALSE);

    $post_name = '';
    if ($post_ID) {
        $current_post = get_post($post_ID);
        if ($current_post) {
            $current_post_type = $current_post->post_type;
            $post_name = $current_post->post_name;
        } else {
            $post_name = '';
        }
    }


    if ($post_name == 'our-process') {

        $meta_box[] = array(
            'title' => __('Steps', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'id' => 'steps_ids_1',
                    'type' => 'group',
                    'clone' => true,
                    'sort_clone' => true,
                    'fields' => array(
                        array(
                            'name' => __('Select position (Left or Right)'),
                            'id' => 'step_position_1',
                            'type' => 'select',
                            'options' => array(
                                'left' => __('Left'),
                                'right' => __('Right'),
                            ),
                        ),
                        array(
                            'name' => 'Image',
                            'id' => "step_image_1",
                            'type' => 'image_advanced',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Step number',
                            'id' => 'number_step_1',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Title',
                            'id' => 'title_step_1',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Sub Title',
                            'id' => 'sub_title_step_1',
                            'type' => 'text',
                        ),
                        array(
                            'name' => __('Select column (1 or 2)'),
                            'id' => 'column_step_1',
                            'type' => 'select',
                            'options' => array(
                                'one' => __('One'),
                                'two' => __('Two'),
                            )
                        ),
                        array(
                            'name' => 'Description',
                            'id' => 'description_step_1',
                            'type' => 'wysiwyg',
                            'hidden' => ['column_step', '=', 'two'],
                        ),
                        array(
                            'name' => 'Description left',
                            'id' => 'description_left_1',
                            'type' => 'wysiwyg',
                            'hidden' => ['column_step', '=', 'one'],
                        ),
                        array(
                            'name' => 'Description right',
                            'id' => 'description_right_1',
                            'type' => 'wysiwyg',
                            'hidden' => ['column_step', '=', 'one'],
                        ),
                        array(
                            'name' => __('Last step?'),
                            'id' => 'last_step_1',
                            'type' => 'select',
                            'options' => array(
                                'no' => __('No'),
                                'yes' => __('Yes'),
                            )
                        ),
                    ),
                ),
            )
        );

        $meta_box[] = array(
            'title' => __('Content two', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'id' => 'content_two_1',
                    'type' => 'wysiwyg',
                )
            )
        );
    }


    if ($post_name == 'home') {
        $meta_box[] = array(
            'id' => 'video_home',
            'title' => 'Video Home',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Image',
                    'id' => "image_video_home_vimeo",
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                ),
                array(
                    'name' => 'Video ID (Vimeo)',
                    'id' => 'video_home_content',
                    'type' => 'text',
                ),
        ));

        $meta_box[] = array(
            'title' => __('Icons home', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'id' => 'icons_home',
                    'type' => 'group',
                    'clone' => true,
                    'sort_clone' => true,
                    'fields' => array(
                        array(
                            'name' => 'Image',
                            'id' => "icon_home_image",
                            'type' => 'image_advanced',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Title',
                            'id' => 'icon_home_title',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'URL ',
                            'id' => 'icon_home_url',
                            'type' => 'text',
                        ),
                    ),
                ),
                array(
                    'id' => 'show_icons_home',
                    'name' => __('Hide this box', 'your-prefix'),
                    'type' => 'checkbox',
                )
            )
        );

        $meta_box[] = array(
            'id' => 'our_process_title_image',
            'title' => 'Our process - Title and Icon',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Title',
                    'id' => 'our_process_title',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Icon',
                    'id' => 'our_process_icon',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                )
        ));


        $meta_box[] = array(
            'title' => __('Our process', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'id' => 'steps_ids',
                    'type' => 'group',
                    'clone' => true,
                    'sort_clone' => true,
                    'fields' => array(
                        array(
                            'name' => __('Select position (Left or Right)'),
                            'id' => 'step_position',
                            'type' => 'select',
                            'options' => array(
                                'left' => __('Left'),
                                'right' => __('Right'),
                            ),
                        ),
                        array(
                            'name' => 'Image',
                            'id' => "step_image",
                            'type' => 'image_advanced',
                            'max_file_uploads' => 1,
                        ),
                        array(
                            'name' => 'Step number',
                            'id' => 'number_step',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Title',
                            'id' => 'title_step',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Sub Title',
                            'id' => 'sub_title_step',
                            'type' => 'text',
                        ),
                        array(
                            'name' => __('Select column (1 or 2)'),
                            'id' => 'column_step',
                            'type' => 'select',
                            'options' => array(
                                'one' => __('One'),
                                'two' => __('Two'),
                            )
                        ),
                        array(
                            'name' => 'Description',
                            'id' => 'description_step',
                            'type' => 'wysiwyg',
                            'hidden' => ['column_step', '=', 'two'],
                        ),
                        array(
                            'name' => 'Description left',
                            'id' => 'description_left',
                            'type' => 'wysiwyg',
                            'hidden' => ['column_step', '=', 'one'],
                        ),
                        array(
                            'name' => 'Description right',
                            'id' => 'description_right',
                            'type' => 'wysiwyg',
                            'hidden' => ['column_step', '=', 'one'],
                        ),
                        array(
                            'name' => __('Last step?'),
                            'id' => 'last_step',
                            'type' => 'select',
                            'options' => array(
                                'no' => __('No'),
                                'yes' => __('Yes'),
                            )
                        ),
                    ),
                ),
            )
        );

        $meta_box[] = array(
            'id' => 'buy_roof_title_image',
            'title' => 'Buy your roof online - Title and Icon',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Title',
                    'id' => 'buy_roof_title',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Icon',
                    'id' => 'buy_roof_icon',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                )
        ));

        $meta_box[] = array(
            'id' => 'content_boxs_four',
            'title' => 'Boxes',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Vetted Professionals',
                    'id' => 'vetted_professionals',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Description',
                    'id' => 'vetted_professionals_description',
                    'type' => 'wysiwyg',
                ),
                array(
                    'name' => 'Vetted Professionals (Image)',
                    'id' => 'vetted_professionals_image',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                ),
                array(
                    'name' => 'Quick response',
                    'id' => 'quick_response',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Description',
                    'id' => 'quick_response_description',
                    'type' => 'wysiwyg',
                ),
                array(
                    'name' => 'Quick response (Image)',
                    'id' => 'quick_response_image',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                ),
                array(
                    'name' => 'Best Pricing',
                    'id' => 'best_pricing',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Description',
                    'id' => 'best_pricing_description',
                    'type' => 'wysiwyg',
                ),
                array(
                    'name' => 'Best Pricing (Image)',
                    'id' => 'best_pricing_image',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                ),
                array(
                    'name' => 'Guaranteed',
                    'id' => 'guaranteed',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Description',
                    'id' => 'guaranteed_description',
                    'type' => 'wysiwyg',
                ),
                array(
                    'name' => 'Guaranteed (Image)',
                    'id' => 'guaranteed_image',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                )
        ));

        $meta_box[] = array(
            'id' => 'form_content',
            'title' => 'Content in form',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Description',
                    'id' => 'form_content_home',
                    'type' => 'wysiwyg',
                ),
        ));

        $meta_box[] = array(
            'id' => 'partners_icon_title',
            'title' => 'Partners - Title and Icon',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Title',
                    'id' => 'partners_title',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Icon',
                    'id' => 'partners_icon',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                )
        ));

        $meta_box[] = array(
            'id' => 'container_additional_home',
            'title' => 'Box Gray',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Description',
                    'id' => 'box_additional_content_home',
                    'type' => 'wysiwyg',
                ),
        ));

        $meta_box[] = array(
            'id' => 'image_home_popup',
            'title' => 'Logo Popup',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Image',
                    'id' => "image_popup_logo",
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                )
        ));
    }

    if ($post_name == 'company-story') {
        $meta_box[] = array(
            'title' => __('Additional boxes', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'id' => 'content_steps_company',
                    'name' => 'Steps',
                    'type' => 'wysiwyg',
                ),
                array(
                    'id' => 'content_two_company',
                    'type' => 'wysiwyg',
                )
            )
        );
        $meta_box[] = array(
            'title' => __('Form', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Form id ',
                    'id' => 'form_id',
                    'type' => 'text',
                ),
            )
        );
        $meta_box[] = array(
            'id' => 'our_team_icon_title',
            'title' => 'Our Team - Title and Icon',
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Title',
                    'id' => 'our_team_title',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Icon',
                    'id' => 'our_team_icon',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                ),
                array(
                    'name' => 'Our Team Description',
                    'id' => 'our_Team_content',
                    'type' => 'wysiwyg',
                ),
                array(
                    'name' => 'Video (Example: Xx_xX7An2l0)',
                    'id' => 'our_team_video',
                    'type' => 'text',
                ),
                array(
                    'id' => 'show_our_team',
                    'name' => __('Hide this box', 'your-prefix'),
                    'type' => 'checkbox',
                ),
        ));

        $meta_box[] = array(
            'title' => __('Image Contact Us', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Icon',
                    'id' => 'contact_us_icon',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                )
            )
        );
    }

    if ($post_name == 'faqs') {
        $meta_box[] = array(
            'title' => __('Content', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Video (Example: Xx_xX7An2l0)',
                    'id' => 'faqs_video',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Icon',
                    'id' => 'faqs_icon',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                )
            )
        );
    }

    if ($post_name == 'gallery-info') {
        $meta_box[] = array(
            'title' => __('Content', 'jp-basic'),
            'pages' => array('page'),
            'fields' => array(
                array(
                    'name' => 'Icon',
                    'id' => 'gallery_icon',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                )
            )
        );
    }


    $meta_box[] = array(
        'id' => 'contractor_page_awards_certifications',
        'title' => 'Awards any Certifications',
        'pages' => array('contractor_page'),
        'fields' => array(
            array(
                'name' => 'Icon',
                'id' => 'awards_certifications_icon',
                'type' => 'image_advanced',
                'max_file_uploads' => -1,
            )
    ));

    $meta_box[] = array(
        'title' => __('Quotes'),
        'pages' => array('contractor_page'),
        'fields' => array(
            array(
                'id' => 'contractor_page_quotes',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Name',
                        'id' => 'contractor_page_quote_title',
                        'type' => 'text'
                    ),
                    array(
                        'name' => 'Quote',
                        'id' => 'contractor_page_quote',
                        'type' => 'wysiwyg'
                    )
                ),
            ),
        ),
    );

    $meta_box[] = array(
        'title' => __('Reviews', 'jp-basic'),
        'pages' => array('contractor_page'),
        'fields' => array(
            array(
                'id' => 'reviews_contractor_page',
                'type' => 'group',
                'clone' => true,
                'sort_clone' => true,
                'fields' => array(
                    array(
                        'name' => 'Name',
                        'id' => 'name_review',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Ranking',
                        'id' => 'ranking_review',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Reviews',
                        'id' => 'reviews_contractor',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Url Reviews',
                        'id' => 'url_reviews_contractor',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Reviewer Logo',
                        'id' => 'logo_contractor_page',
                        'type' => 'image_advanced',
                        'max_file_uploads' => -1,
                    )
                ),
            ),
        )
    );

    $meta_box[] = array(
        'id' => 'gallery_contractor',
        'title' => 'Gallery',
        'pages' => array('contractor_page'),
        'fields' => array(
            array(
                'id' => 'gallery_contractor_page',
                'type' => 'wysiwyg',
            )
    ));

    if (is_array($meta_box)) {
        foreach ($meta_box as $value) {
            new RW_Meta_Box($value);
        }
    }
}

add_action('wp_ajax_rwmb_reorder_images', array("RWMB_Image_Field", 'wp_ajax_reorder_images'));
add_action('wp_ajax_rwmb_delete_file', array("RWMB_File_Field", 'wp_ajax_delete_file'));
add_action('wp_ajax_rwmb_attach_media', array("RWMB_Image_Advanced_Field", 'wp_ajax_attach_media'));
add_action('admin_init', 'rw_register_meta_box');

// Register Custom Taxonomy
function custom_products_categories() {

    $labels = array(
        'name' => _x('Categories', 'Taxonomy General Name', 'jp-basic'),
        'singular_name' => _x('Category', 'Taxonomy Singular Name', 'jp-basic'),
        'menu_name' => __('Categories', 'jp-basic'),
        'all_items' => __('All Items', 'jp-basic'),
        'parent_item' => __('Parent Item', 'jp-basic'),
        'parent_item_colon' => __('Parent Item:', 'jp-basic'),
        'new_item_name' => __('New Item Name', 'jp-basic'),
        'add_new_item' => __('Add New Item', 'jp-basic'),
        'edit_item' => __('Edit Item', 'jp-basic'),
        'update_item' => __('Update Item', 'jp-basic'),
        'view_item' => __('View Item', 'jp-basic'),
        'separate_items_with_commas' => __('Separate items with commas', 'jp-basic'),
        'add_or_remove_items' => __('Add or remove items', 'jp-basic'),
        'choose_from_most_used' => __('Choose from the most used', 'jp-basic'),
        'popular_items' => __('Popular Items', 'jp-basic'),
        'search_items' => __('Search Items', 'jp-basic'),
        'not_found' => __('Not Found', 'jp-basic'),
        'no_terms' => __('No items', 'jp-basic'),
        'items_list' => __('Items list', 'jp-basic'),
        'items_list_navigation' => __('Items list navigation', 'jp-basic'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('products-categories', array('products'), $args);
}

add_action('init', 'custom_products_categories', 0);

// Register Custom Post Type
function custom_products() {

    $labels = array(
        'name' => _x('Products', 'Post Type General Name', 'jp-basic'),
        'singular_name' => _x('Product', 'Post Type Singular Name', 'jp-basic'),
        'menu_name' => __('Products', 'jp-basic'),
        'name_admin_bar' => __('Products', 'jp-basic'),
        'archives' => __('Item Archives', 'jp-basic'),
        'attributes' => __('Item Attributes', 'jp-basic'),
        'parent_item_colon' => __('Parent Item:', 'jp-basic'),
        'all_items' => __('All Items', 'jp-basic'),
        'add_new_item' => __('Add New Item', 'jp-basic'),
        'add_new' => __('Add New', 'jp-basic'),
        'new_item' => __('New Item', 'jp-basic'),
        'edit_item' => __('Edit Item', 'jp-basic'),
        'update_item' => __('Update Item', 'jp-basic'),
        'view_item' => __('View Item', 'jp-basic'),
        'view_items' => __('View Items', 'jp-basic'),
        'search_items' => __('Search Item', 'jp-basic'),
        'not_found' => __('Not found', 'jp-basic'),
        'not_found_in_trash' => __('Not found in Trash', 'jp-basic'),
        'featured_image' => __('Featured Image', 'jp-basic'),
        'set_featured_image' => __('Set featured image', 'jp-basic'),
        'remove_featured_image' => __('Remove featured image', 'jp-basic'),
        'use_featured_image' => __('Use as featured image', 'jp-basic'),
        'insert_into_item' => __('Insert into item', 'jp-basic'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'jp-basic'),
        'items_list' => __('Items list', 'jp-basic'),
        'items_list_navigation' => __('Items list navigation', 'jp-basic'),
        'filter_items_list' => __('Filter items list', 'jp-basic'),
    );
    $args = array(
        'label' => __('Product', 'jp-basic'),
        'description' => __('Products description', 'jp-basic'),
        'labels' => $labels,
        'taxonomies' => array('products-categories'),
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-products',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('products', $args);
}

add_action('init', 'custom_products', 0);

// Register Custom Post Type
function custom_partners() {

    $labels = array(
        'name' => _x('Partners', 'Post Type General Name', 'jp-basic'),
        'singular_name' => _x('Partner', 'Post Type Singular Name', 'jp-basic'),
        'menu_name' => __('Partners', 'jp-basic'),
        'name_admin_bar' => __('Partners', 'jp-basic'),
        'archives' => __('Item Archives', 'jp-basic'),
        'attributes' => __('Item Attributes', 'jp-basic'),
        'parent_item_colon' => __('Parent Item:', 'jp-basic'),
        'all_items' => __('All Items', 'jp-basic'),
        'add_new_item' => __('Add New Item', 'jp-basic'),
        'add_new' => __('Add New', 'jp-basic'),
        'new_item' => __('New Item', 'jp-basic'),
        'edit_item' => __('Edit Item', 'jp-basic'),
        'update_item' => __('Update Item', 'jp-basic'),
        'view_item' => __('View Item', 'jp-basic'),
        'view_items' => __('View Items', 'jp-basic'),
        'search_items' => __('Search Item', 'jp-basic'),
        'not_found' => __('Not found', 'jp-basic'),
        'not_found_in_trash' => __('Not found in Trash', 'jp-basic'),
        'featured_image' => __('Featured Image', 'jp-basic'),
        'set_featured_image' => __('Set featured image', 'jp-basic'),
        'remove_featured_image' => __('Remove featured image', 'jp-basic'),
        'use_featured_image' => __('Use as featured image', 'jp-basic'),
        'insert_into_item' => __('Insert into item', 'jp-basic'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'jp-basic'),
        'items_list' => __('Items list', 'jp-basic'),
        'items_list_navigation' => __('Items list navigation', 'jp-basic'),
        'filter_items_list' => __('Filter items list', 'jp-basic'),
    );
    $args = array(
        'label' => __('Partner', 'jp-basic'),
        'description' => __('Post Type Description', 'jp-basic'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessman',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('partners', $args);
}

add_action('init', 'custom_partners', 0);

// Register Custom Post Type
function custom_faqs() {

    $labels = array(
        'name' => _x('Faqs', 'Post Type General Name', 'jp-basic'),
        'singular_name' => _x('Faqs', 'Post Type Singular Name', 'jp-basic'),
        'menu_name' => __('Faqs', 'jp-basic'),
        'name_admin_bar' => __('Faqs', 'jp-basic'),
        'archives' => __('Item Archives', 'jp-basic'),
        'attributes' => __('Item Attributes', 'jp-basic'),
        'parent_item_colon' => __('Parent Item:', 'jp-basic'),
        'all_items' => __('All Items', 'jp-basic'),
        'add_new_item' => __('Add New Item', 'jp-basic'),
        'add_new' => __('Add New', 'jp-basic'),
        'new_item' => __('New Item', 'jp-basic'),
        'edit_item' => __('Edit Item', 'jp-basic'),
        'update_item' => __('Update Item', 'jp-basic'),
        'view_item' => __('View Item', 'jp-basic'),
        'view_items' => __('View Items', 'jp-basic'),
        'search_items' => __('Search Item', 'jp-basic'),
        'not_found' => __('Not found', 'jp-basic'),
        'not_found_in_trash' => __('Not found in Trash', 'jp-basic'),
        'featured_image' => __('Featured Image', 'jp-basic'),
        'set_featured_image' => __('Set featured image', 'jp-basic'),
        'remove_featured_image' => __('Remove featured image', 'jp-basic'),
        'use_featured_image' => __('Use as featured image', 'jp-basic'),
        'insert_into_item' => __('Insert into item', 'jp-basic'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'jp-basic'),
        'items_list' => __('Items list', 'jp-basic'),
        'items_list_navigation' => __('Items list navigation', 'jp-basic'),
        'filter_items_list' => __('Filter items list', 'jp-basic'),
    );
    $args = array(
        'label' => __('Faqs', 'jp-basic'),
        'description' => __('Post Type Description', 'jp-basic'),
        'labels' => $labels,
        'supports' => array('title', 'editor',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-quote',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('faqs', $args);
}

add_action('init', 'custom_faqs', 0);

function custom_gallery() {

    $labels = array(
        'name' => _x('Galeries', 'Post Type General Name', 'jp-basic'),
        'singular_name' => _x('Gallery', 'Post Type Singular Name', 'jp-basic'),
        'menu_name' => __('Gallery', 'jp-basic'),
        'name_admin_bar' => __('Gallery', 'jp-basic'),
        'archives' => __('Item Archives', 'jp-basic'),
        'attributes' => __('Item Attributes', 'jp-basic'),
        'parent_item_colon' => __('Parent Item:', 'jp-basic'),
        'all_items' => __('All Items', 'jp-basic'),
        'add_new_item' => __('Add New Item', 'jp-basic'),
        'add_new' => __('Add New', 'jp-basic'),
        'new_item' => __('New Item', 'jp-basic'),
        'edit_item' => __('Edit Item', 'jp-basic'),
        'update_item' => __('Update Item', 'jp-basic'),
        'view_item' => __('View Item', 'jp-basic'),
        'view_items' => __('View Items', 'jp-basic'),
        'search_items' => __('Search Item', 'jp-basic'),
        'not_found' => __('Not found', 'jp-basic'),
        'not_found_in_trash' => __('Not found in Trash', 'jp-basic'),
        'featured_image' => __('Featured Image', 'jp-basic'),
        'set_featured_image' => __('Set featured image', 'jp-basic'),
        'remove_featured_image' => __('Remove featured image', 'jp-basic'),
        'use_featured_image' => __('Use as featured image', 'jp-basic'),
        'insert_into_item' => __('Insert into item', 'jp-basic'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'jp-basic'),
        'items_list' => __('Items list', 'jp-basic'),
        'items_list_navigation' => __('Items list navigation', 'jp-basic'),
        'filter_items_list' => __('Filter items list', 'jp-basic'),
    );
    $args = array(
        'label' => __('Gallery', 'jp-basic'),
        'description' => __('Gallery houses', 'jp-basic'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt2',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('gallery', $args);
}

add_action('init', 'custom_gallery', 0);

// Register Custom Post Type
function contractor_page() {

    $labels = array(
        'name' => 'Contractor pages',
        'singular_name' => 'Contractor page',
        'menu_name' => 'Contractor page',
        'name_admin_bar' => 'Contractor page',
        'archives' => 'Item Archives',
        'attributes' => 'Item Attributes',
        'parent_item_colon' => 'Parent Item:',
        'all_items' => 'All Items',
        'add_new_item' => 'Add New Item',
        'add_new' => 'Add New',
        'new_item' => 'New Item',
        'edit_item' => 'Edit Item',
        'update_item' => 'Update Item',
        'view_item' => 'View Item',
        'view_items' => 'View Items',
        'search_items' => 'Search Item',
        'not_found' => 'Not found',
        'not_found_in_trash' => 'Not found in Trash',
        'featured_image' => 'Featured Image',
        'set_featured_image' => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image' => 'Use as featured image',
        'insert_into_item' => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list' => 'Items list',
        'items_list_navigation' => 'Items list navigation',
        'filter_items_list' => 'Filter items list',
    );
    $args = array(
        'label' => 'Contractor page',
        'description' => 'Post Type Description',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('contractor_page', $args);
}

add_action('init', 'contractor_page', 0);


add_filter('rwmb_meta_boxes', 'price_meta_box');

function price_meta_box($meta_boxes) {
    $meta_boxes[] = array(
        'taxonomies' => 'products-categories', // List of taxonomies. Array or string
        'fields' => array(
            array(
                'name' => __('Price'),
                'id' => 'products-price',
                'type' => 'select',
                'options' => array(
                    '1' => __('$'),
                    '2' => __('$$'),
                    '3' => __('$$$'),
                    '4' => __('$$$$'),
                    '5' => __('$$$$$'),
                )
            ),
            array(
                'id' => 'show_most_popular',
                'name' => __('Most Popular?', 'your-prefix'),
                'type' => 'checkbox',
            )
        ),
    );
    return $meta_boxes;
}