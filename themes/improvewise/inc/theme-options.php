<?php
/**
 * Theme Options
 *
 * @package WordPress
 * @subpackage PJFitz
 * @since PJFitz 1.0
 */

/**
 * Add Theme Options to admin menu
 */
function register_theme_options() {
    add_submenu_page(
            'themes.php', 'Theme Options', 'Theme Options', 'manage_categories', 'new-theme-options', 'callback_theme_options'
    );
}

add_action('admin_menu', 'register_theme_options');

/**
 * Display page content
 */
function callback_theme_options() {
    if (isset($_POST['update'])) {

        // Remove magic quotes
        $_POST = array_map('stripslashes_deep', $_POST);

        // Set variables from post
        $org_type = esc_attr($_POST['org-type']);
        $name = esc_attr($_POST['name']);
        $url = esc_attr($_POST['url']);
        $addr = esc_attr($_POST['addr']);
        $po = esc_attr($_POST['po']);
        $city = esc_attr($_POST['city']);
        $state = esc_attr($_POST['state']);
        $zip = esc_attr($_POST['zip']);
        $country = esc_attr($_POST['country']);
        $tel = esc_attr($_POST['tel']);
        $fax = esc_attr($_POST['fax']);
        $email = esc_attr($_POST['email']);
        $hours = esc_attr($_POST['hours']);
        $map_url = esc_attr($_POST['map_url']);
        $map = esc_attr($_POST['map']);

        $org_type2 = esc_attr($_POST['org-type2']);
        $name2 = esc_attr($_POST['name2']);
        $url2 = esc_attr($_POST['url2']);
        $addr2 = esc_attr($_POST['addr2']);
        $po2 = esc_attr($_POST['po2']);
        $city2 = esc_attr($_POST['city2']);
        $state2 = esc_attr($_POST['state2']);
        $zip2 = esc_attr($_POST['zip2']);
        $country2 = esc_attr($_POST['country2']);
        $tel2 = esc_attr($_POST['tel2']);
        $fax2 = esc_attr($_POST['fax2']);
        $email2 = esc_attr($_POST['email2']);
        $hours2 = esc_attr($_POST['hours2']);
        $map_url2 = esc_attr($_POST['map_url2']);
        $map2 = esc_attr($_POST['map2']);

        $org_type3 = esc_attr($_POST['org-type3']);
        $name3 = esc_attr($_POST['name3']);
        $url3 = esc_attr($_POST['url3']);
        $addr3 = esc_attr($_POST['addr3']);
        $po3 = esc_attr($_POST['po3']);
        $city3 = esc_attr($_POST['city3']);
        $state3 = esc_attr($_POST['state3']);
        $zip3 = esc_attr($_POST['zip3']);
        $country3 = esc_attr($_POST['country3']);
        $tel3 = esc_attr($_POST['tel3']);
        $fax3 = esc_attr($_POST['fax3']);
        $email3 = esc_attr($_POST['email3']);
        $hours3 = esc_attr($_POST['hours3']);
        $map_url3 = esc_attr($_POST['map_url3']);
        $map3 = esc_attr($_POST['map3']);

        $logo_src = esc_attr($_POST['logo-src']);
        $logo_alt = esc_attr($_POST['logo-alt']);
        
        $logo_src_scroll = esc_attr($_POST['logo-src-scroll']);
        $logo_alt_scroll = esc_attr($_POST['logo-alt-scroll']);

        $logo_footer_src = esc_attr($_POST['logo_footer_src']);
        $logo_footer_alt_src = esc_attr($_POST['logo_footer_alt_src']);

        $logo_src_r = esc_attr($_POST['logo-src_r']);
        $logo_alt_r = esc_attr($_POST['logo-alt_r']);

        $favicon = esc_attr($_POST['favicon']);

        $bg_src = esc_attr($_POST['bg-src']);
        $bg_alt = esc_attr($_POST['bg-alt']);

        $facebook = esc_attr($_POST['facebook']);
        $instagram = esc_attr($_POST['instagram']);
        $twitter = esc_attr($_POST['twitter']);
        $googleplus = esc_attr($_POST['googleplus']);
        $youtube = esc_attr($_POST['youtube']);
        $linkedin = esc_attr($_POST['linkedin']);
        $pinterest = esc_attr($_POST['pinterest']);
        $tumblr = esc_attr($_POST['tumblr']);
        $rss = esc_attr($_POST['rss']);

        $footer = $_POST['footer'];

        // Save options
        update_option('theme_options_org_type', $org_type);
        update_option('theme_options_name', $name);
        update_option('theme_options_url', $url);
        update_option('theme_options_addr', $addr);
        update_option('theme_options_po', $po);
        update_option('theme_options_city', $city);
        update_option('theme_options_state', $state);
        update_option('theme_options_zip', $zip);
        update_option('theme_options_country', $country);
        update_option('theme_options_tel', $tel);
        update_option('theme_options_fax', $fax);
        update_option('theme_options_email', $email);
        update_option('theme_options_hours', $hours);
        update_option('theme_options_map_url', $map_url);
        update_option('theme_options_map', $map);

        update_option('theme_options_org_type2', $org_type2);
        update_option('theme_options_name2', $name2);
        update_option('theme_options_url2', $url2);
        update_option('theme_options_addr2', $addr2);
        update_option('theme_options_po2', $po2);
        update_option('theme_options_city2', $city2);
        update_option('theme_options_state2', $state2);
        update_option('theme_options_zip2', $zip2);
        update_option('theme_options_country2', $country2);
        update_option('theme_options_tel2', $tel2);
        update_option('theme_options_fax2', $fax2);
        update_option('theme_options_email2', $email2);
        update_option('theme_options_hours2', $hours2);
        update_option('theme_options_map_url2', $map_url2);
        update_option('theme_options_map2', $map2);

        update_option('theme_options_org_type3', $org_type3);
        update_option('theme_options_name3', $name3);
        update_option('theme_options_url3', $url3);
        update_option('theme_options_addr3', $addr3);
        update_option('theme_options_po3', $po3);
        update_option('theme_options_city3', $city3);
        update_option('theme_options_state3', $state3);
        update_option('theme_options_zip3', $zip3);
        update_option('theme_options_country3', $country3);
        update_option('theme_options_tel3', $tel3);
        update_option('theme_options_fax3', $fax3);
        update_option('theme_options_email3', $email3);
        update_option('theme_options_hours3', $hours3);
        update_option('theme_options_map_url3', $map_url3);
        update_option('theme_options_map3', $map3);

        update_option('theme_options_logo_src', $logo_src);
        update_option('theme_options_logo_alt', $logo_alt);
        
        update_option('theme_options_logo_src_scroll', $logo_src_scroll);
        update_option('theme_options_logo_alt_scroll', $logo_alt_scroll);

        update_option('theme_options_logo_footer_src', $logo_footer_src);
        update_option('theme_options_logo_footer_alt_src', $logo_footer_alt_src);

        update_option('theme_options_logo_src_r', $logo_src_r);
        update_option('theme_options_logo_alt_r', $logo_alt_r);

        update_option('theme_options_favicon', $favicon);

        update_option('theme_options_bg_src', $bg_src);
        update_option('theme_options_bg_alt', $bg_alt);

        update_option('theme_options_facebook', $facebook);
        update_option('theme_options_instagram', $instagram);
        update_option('theme_options_twitter', $twitter);
        update_option('theme_options_googleplus', $googleplus);
        update_option('theme_options_youtube', $youtube);
        update_option('theme_options_linkedin', $linkedin);
        update_option('theme_options_pinterest', $pinterest);
        update_option('theme_options_tumblr', $tumblr);
        update_option('theme_options_rss', $rss);

        update_option('theme_options_footer', $footer);

        // Display message
        echo '<div id="message" class="updated"><p><strong>Settings saved.</strong></p></div>';
    } else {

        // Set variables from database
        $org_type = get_option('theme_options_org_type');
        $name = get_option('theme_options_name');
        $url = get_option('theme_options_url');
        $addr = get_option('theme_options_addr');
        $po = get_option('theme_options_po');
        $city = get_option('theme_options_city');
        $state = get_option('theme_options_state');
        $zip = get_option('theme_options_zip');
        $country = get_option('theme_options_country');
        $tel = get_option('theme_options_tel');
        $fax = get_option('theme_options_fax');
        $email = get_option('theme_options_email');
        $hours = get_option('theme_options_hours');
        $map_url = get_option('theme_options_map_url');
        $map = get_option('theme_options_map');

        $org_type2 = get_option('theme_options_org_type2');
        $name2 = get_option('theme_options_name2');
        $url2 = get_option('theme_options_url2');
        $addr2 = get_option('theme_options_addr2');
        $po2 = get_option('theme_options_po2');
        $city2 = get_option('theme_options_city2');
        $state2 = get_option('theme_options_state2');
        $zip2 = get_option('theme_options_zip2');
        $country2 = get_option('theme_options_country2');
        $tel2 = get_option('theme_options_tel2');
        $fax2 = get_option('theme_options_fax2');
        $email2 = get_option('theme_options_email2');
        $hours2 = get_option('theme_options_hours2');
        $map_url2 = get_option('theme_options_map_url2');
        $map2 = get_option('theme_options_map2');

        $org_type3 = get_option('theme_options_org_type3');
        $name3 = get_option('theme_options_name3');
        $url3 = get_option('theme_options_url3');
        $addr3 = get_option('theme_options_addr3');
        $po3 = get_option('theme_options_po3');
        $city3 = get_option('theme_options_city3');
        $state3 = get_option('theme_options_state3');
        $zip3 = get_option('theme_options_zip3');
        $country3 = get_option('theme_options_country3');
        $tel3 = get_option('theme_options_tel3');
        $fax3 = get_option('theme_options_fax3');
        $email3 = get_option('theme_options_email3');
        $hours3 = get_option('theme_options_hours3');
        $map_url3 = get_option('theme_options_map_url3');
        $map3 = get_option('theme_options_map3');

        $logo_src = get_option('theme_options_logo_src');
        $logo_alt = get_option('theme_options_logo_alt');
        
        $logo_src_scroll = get_option('theme_options_logo_src_scroll');
        $logo_alt_scroll = get_option('theme_options_logo_alt_scroll');
        
        $logo_footer_src = get_option('theme_options_logo_footer_src');
        $logo_footer_alt_src = get_option('theme_options_footer_alt_src');

        $logo_src_r = get_option('theme_options_logo_src_r');
        $logo_alt_r = get_option('theme_options_logo_alt_r');

        $favicon = get_option('theme_options_favicon');

        $bg_src = get_option('theme_options_bg_src');
        $bg_alt = get_option('theme_options_bg_alt');

        $facebook = get_option('theme_options_facebook');
        $instagram = get_option('theme_options_instagram');
        $twitter = get_option('theme_options_twitter');
        $googleplus = get_option('theme_options_googleplus');
        $youtube = get_option('theme_options_youtube');
        $linkedin = get_option('theme_options_linkedin');
        $pinterest = get_option('theme_options_pinterest');
        $tumblr = get_option('theme_options_tumblr');
        $rss = get_option('theme_options_rss');

        $footer = get_option('theme_options_footer');
    }
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Theme Options</h2>
        <?php settings_errors(); ?>

        <form action="" method="post">
            <h3>Contact Information</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="org-type">Type of Organization:</label>
                    </th>
                    <td>
                        <select id="org-type" name="org-type">
                            <option value="Organization"<?php if ($org_type == 'Organization') echo ' selected="selected"'; ?>>General</option>
                            <option value="Corporation"<?php if ($org_type == 'Corporation') echo ' selected="selected"'; ?>>Corporation</option>
                            <option value="EducationalOrganization"<?php if ($org_type == 'EducationalOrganization') echo ' selected="selected"'; ?>>School</option>
                            <option value="GovernmentOrganization"<?php if ($org_type == 'GovernmentOrganization') echo ' selected="selected"'; ?>>Government</option>
                            <option value="LocalBusiness"<?php if ($org_type == 'LocalBusiness') echo ' selected="selected"'; ?>>Local Business</option>
                            <option value="NGO"<?php if ($org_type == 'NGO') echo ' selected="selected"'; ?>>NGO</option>
                            <option value="PerformingGroup"<?php if ($org_type == 'PerformingGroup') echo ' selected="selected"'; ?>>Performing Group</option>
                            <option value="SportsTeam"<?php if ($org_type == 'SportsTeam') echo ' selected="selected"'; ?>>Sports Team</option>
                        </select>
                    </td>
                    <td>
                        <select id="org-type2" name="org-type2">
                            <option value="Organization"<?php if ($org_type2 == 'Organization') echo ' selected="selected"'; ?>>General</option>
                            <option value="Corporation"<?php if ($org_type2 == 'Corporation') echo ' selected="selected"'; ?>>Corporation</option>
                            <option value="EducationalOrganization"<?php if ($org_type2 == 'EducationalOrganization') echo ' selected="selected"'; ?>>School</option>
                            <option value="GovernmentOrganization"<?php if ($org_type2 == 'GovernmentOrganization') echo ' selected="selected"'; ?>>Government</option>
                            <option value="LocalBusiness"<?php if ($org_type2 == 'LocalBusiness') echo ' selected="selected"'; ?>>Local Business</option>
                            <option value="NGO"<?php if ($org_type2 == 'NGO') echo ' selected="selected"'; ?>>NGO</option>
                            <option value="PerformingGroup"<?php if ($org_type2 == 'PerformingGroup') echo ' selected="selected"'; ?>>Performing Group</option>
                            <option value="SportsTeam"<?php if ($org_type2 == 'SportsTeam') echo ' selected="selected"'; ?>>Sports Team</option>
                        </select>
                    </td>
                    <td>
                        <select id="org-type3" name="org-type3">
                            <option value="Organization"<?php if ($org_type3 == 'Organization') echo ' selected="selected"'; ?>>General</option>
                            <option value="Corporation"<?php if ($org_type3 == 'Corporation') echo ' selected="selected"'; ?>>Corporation</option>
                            <option value="EducationalOrganization"<?php if ($org_type3 == 'EducationalOrganization') echo ' selected="selected"'; ?>>School</option>
                            <option value="GovernmentOrganization"<?php if ($org_type3 == 'GovernmentOrganization') echo ' selected="selected"'; ?>>Government</option>
                            <option value="LocalBusiness"<?php if ($org_type3 == 'LocalBusiness') echo ' selected="selected"'; ?>>Local Business</option>
                            <option value="NGO"<?php if ($org_type3 == 'NGO') echo ' selected="selected"'; ?>>NGO</option>
                            <option value="PerformingGroup"<?php if ($org_type3 == 'PerformingGroup') echo ' selected="selected"'; ?>>Performing Group</option>
                            <option value="SportsTeam"<?php if ($org_type3 == 'SportsTeam') echo ' selected="selected"'; ?>>Sports Team</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="name">Name:</label>
                    </th>
                    <td>
                        <input type="text" id="name" name="name" size="30" value="<?php echo $name; ?>" />
                    </td>
                    <td>
                        <input type="text" id="name2" name="name2" size="30" value="<?php echo $name2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="name3" name="name3" size="30" value="<?php echo $name3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="url">URL:</label>
                    </th>
                    <td>
                        <input type="text" id="url" name="url" size="30" value="<?php echo $url; ?>" />
                    </td>
                    <td>
                        <input type="text" id="url2" name="url2" size="30" value="<?php echo $url2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="url3" name="url3" size="30" value="<?php echo $url3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="addr">Street Address:</label>
                    </th>
                    <td>
                        <input type="text" id="addr" name="addr" value="<?php echo $addr; ?>" />
                    </td>
                    <td>
                        <input type="text" id="addr2" name="addr2" value="<?php echo $addr2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="addr3" name="addr3" value="<?php echo $addr3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="po">PO Box:</label>
                    </th>
                    <td>
                        <input type="text" id="po" name="po" size="10" value="<?php echo $po; ?>" />
                    </td>
                    <td>
                        <input type="text" id="po2" name="po2" size="10" value="<?php echo $po2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="po3" name="po3" size="10" value="<?php echo $po3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="city">City:</label>
                    </th>
                    <td>
                        <input type="text" id="city" name="city" value="<?php echo $city; ?>" />
                    </td>
                    <td>
                        <input type="text" id="city2" name="city2" value="<?php echo $city2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="city3" name="city3" value="<?php echo $city3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="state">State/Region:</label>
                    </th>
                    <td>
                        <input type="text" id="state" name="state" value="<?php echo $state; ?>" />
                    </td>
                    <td>
                        <input type="text" id="state2" name="state2" value="<?php echo $state2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="state3" name="state3" value="<?php echo $state3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="zip">Postal Code:</label>
                    </th>
                    <td>
                        <input type="text" id="zip" name="zip" size="10" value="<?php echo $zip; ?>" />
                    </td>
                    <td>
                        <input type="text" id="zip2" name="zip2" size="10" value="<?php echo $zip2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="zip3" name="zip3" size="10" value="<?php echo $zip3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="country">Country:</label>
                    </th>
                    <td>
                        <input type="text" id="country" name="country" value="<?php echo $country; ?>" />
                    </td>
                    <td>
                        <input type="text" id="country2" name="country2" value="<?php echo $country2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="country3" name="country3" value="<?php echo $country3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="tel">Phone Number:</label>
                    </th>
                    <td>
                        <input type="text" id="tel" name="tel" size="15" value="<?php echo $tel; ?>" />
                    </td>
                    <td>
                        <input type="text" id="tel2" name="tel2" size="15" value="<?php echo $tel2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="tel3" name="tel3" size="15" value="<?php echo $tel3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="fax">Fax Number:</label>
                    </th>
                    <td>
                        <input type="text" id="fax" name="fax" size="15" value="<?php echo $fax; ?>" />
                    </td>
                    <td>
                        <input type="text" id="fax2" name="fax2" size="15" value="<?php echo $fax2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="fax3" name="fax3" size="15" value="<?php echo $fax3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="email">Email Address:</label>
                    </th>
                    <td>
                        <input type="text" id="email" name="email" size="30" value="<?php echo $email; ?>" />
                    </td>
                    <td>
                        <input type="text" id="email2" name="email2" size="30" value="<?php echo $email2; ?>" />
                    </td>
                    <td>
                        <input type="text" id="email3" name="email3" size="30" value="<?php echo $email3; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="hours">Hours:</label>
                    </th>
                    <td>
                        <textarea id="hours" name="hours" cols="28" rows="5"><?php echo $hours; ?></textarea>
                    </td>
                    <td>
                        <textarea id="hours2" name="hours2" cols="28" rows="5"><?php echo $hours2; ?></textarea>
                    </td>
                    <td>
                        <textarea id="hours3" name="hours3" cols="28" rows="5"><?php echo $hours3; ?></textarea>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="map">Google Map:</label>
                    </th>
                    <td>
                        <input type="text" id="map_url" name="map_url" size="30" value="<?php echo $map_url; ?>" /><br>
                        <textarea id="map" name="map" cols="28" rows="5"><?php echo $map; ?></textarea>
                    </td>
                    <td>
                        <input type="text" id="map_url2" name="map_url2" size="30" value="<?php echo $map_url2; ?>" /><br>
                        <textarea id="map2" name="map2" cols="28" rows="5"><?php echo $map2; ?></textarea>
                    </td>
                    <td>
                        <input type="text" id="map_url3" name="map_url3" size="30" value="<?php echo $map_url3; ?>" /><br>
                        <textarea id="map3" name="map3" cols="28" rows="5"><?php echo $map3; ?></textarea>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>

            <hr />

            <h3>Global</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="logo-src">Logo:</label>
                    </th>
                    <td>
                        <input type="text" id="logo-src" name="logo-src" class="src" value="<?php echo $logo_src; ?>" />
                        <input type="hidden" id="logo-alt" name="logo-alt" class="alt" value="<?php echo $logo_alt; ?>" />
                        <input type="button" id="logo-btn" class="upload-button button" value="Add Image" />
                        <a href="#" class="upload-reset">Remove</a>
                    </td>
                </tr>
                <?php if (!empty($logo_src)) : ?>
                    <tr valign="top">
                        <td>&nbsp;</td>
                        <td><img src="<?php echo $logo_src; ?>" alt="<?php echo $logo_alt; ?>" /></td>
                    </tr>
                <?php endif; ?>
            </table>

            <hr />
            
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="logo-src-scroll">Logo scroll:</label>
                    </th>
                    <td>
                        <input type="text" id="logo-src-scroll" name="logo-src-scroll" class="src" value="<?php echo $logo_src_scroll; ?>" />
                        <input type="hidden" id="logo-alt-scroll" name="logo-alt-scroll" class="alt" value="<?php echo $logo_alt_scroll; ?>" />
                        <input type="button" id="logo-btn-scroll" class="upload-button button" value="Add Image" />
                        <a href="#" class="upload-reset">Remove</a>
                    </td>
                </tr>
                <?php if (!empty($logo_src_scroll)) : ?>
                    <tr valign="top">
                        <td>&nbsp;</td>
                        <td><img src="<?php echo $logo_src_scroll; ?>" alt="<?php echo $logo_alt_scroll; ?>" /></td>
                    </tr>
                <?php endif; ?>
            </table>

            <hr />

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="logo_footer_src">Logo Footer:</label>
                    </th>
                    <td>
                        <input type="text" id="logo_footer_src" name="logo_footer_src" class="src" value="<?php echo $logo_footer_src; ?>" />
                        <input type="hidden" id="logo_footer_alt_src" name="logo_footer_alt_src" class="alt" value="<?php echo $logo_footer_alt_src; ?>" />
                        <input type="button" id="logo_footer_alt_src" class="upload-button button" value="Add Image" />
                        <a href="#" class="upload-reset">Remove</a>
                    </td>
                </tr>
                <?php if (!empty($logo_src_r)) : ?>
                    <tr valign="top">
                        <td>&nbsp;</td>
                        <td><img src="<?php echo $logo_src_r; ?>" alt="<?php echo $logo_alt_r; ?>" /></td>
                    </tr>
                <?php endif; ?>
            </table>

            <hr />
            
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="logo-src_r">Logo Responsive:</label>
                    </th>
                    <td>
                        <input type="text" id="logo-src_r" name="logo-src_r" class="src" value="<?php echo $logo_src_r; ?>" />
                        <input type="hidden" id="logo-alt_r" name="logo-alt_r" class="alt" value="<?php echo $logo_alt_r; ?>" />
                        <input type="button" id="logo-btn_r" class="upload-button button" value="Add Image" />
                        <a href="#" class="upload-reset">Remove</a>
                    </td>
                </tr>
                <?php if (!empty($logo_src_r)) : ?>
                    <tr valign="top">
                        <td>&nbsp;</td>
                        <td><img src="<?php echo $logo_src_r; ?>" alt="<?php echo $logo_alt_r; ?>" /></td>
                    </tr>
                <?php endif; ?>
            </table>

            <hr />

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="favicon">Favicon:</label>
                    </th>
                    <td>
                        <input type="text" id="favicon" name="favicon" class="src" value="<?php echo $favicon; ?>" />
                        <input type="button" id="favicon_upload" class="upload-button button" value="Add Image" />
                        <a href="#" class="upload-reset">Remove</a>
                    </td>
                </tr>
                <?php if (!empty($favicon)) : ?>
                    <tr valign="top">
                        <td>&nbsp;</td>
                        <td><img src="<?php echo $favicon; ?>"/></td>
                    </tr>
                <?php endif; ?>
            </table>

            <hr />

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="logo-bg">Background:</label>
                    </th>
                    <td>
                        <input type="text" id="bg-src" name="bg-src" class="src" value="<?php echo $bg_src; ?>" />
                        <input type="hidden" id="bg-alt" name="bg-alt" class="alt" value="<?php echo $bg_alt; ?>" />
                        <input type="button" id="bg-btn" class="upload-button button" value="Add Image" />
                        <a href="#" class="upload-reset">Remove</a>
                    </td>
                </tr>
                <?php if (!empty($bg_src)) : ?>
                    <tr valign="top">
                        <td>&nbsp;</td>
                        <td><img src="<?php echo $bg_src; ?>" alt="<?php echo $bg_alt; ?>" style="max-width: 500px;"/></td>
                    </tr>
                <?php endif; ?>
            </table>

            <?php submit_button(); ?>

            <hr />

            <h3>Social Media</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook">Facebook URL:</label>
                    </th>
                    <td>
                        <input type="text" id="facebook" name="facebook" size="50" value="<?php echo $facebook; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="instagram">Instagram URL:</label>
                    </th>
                    <td>
                        <input type="text" id="instagram" name="instagram" size="50" value="<?php echo $instagram; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="twitter">Twitter URL:</label>
                    </th>
                    <td>
                        <input type="text" id="twitter" name="twitter" size="50" value="<?php echo $twitter; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="googleplus">Google+ URL:</label>
                    </th>
                    <td>
                        <input type="text" id="googleplus" name="googleplus" size="50" value="<?php echo $googleplus; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="youtube">YouTube URL:</label>
                    </th>
                    <td>
                        <input type="text" id="youtube" name="youtube" size="50" value="<?php echo $youtube; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="linkedin">LinkedIn URL:</label>
                    </th>
                    <td>
                        <input type="text" id="linkedin" name="linkedin" size="50" value="<?php echo $linkedin; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="pinterest">Pinterest URL:</label>
                    </th>
                    <td>
                        <input type="text" id="pinterest" name="pinterest" size="50" value="<?php echo $pinterest; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="tumblr">Tumblr URL:</label>
                    </th>
                    <td>
                        <input type="text" id="tumblr" name="tumblr" size="50" value="<?php echo $tumblr; ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="rss">RSS URL:</label>
                    </th>
                    <td>
                        <input type="text" id="rss" name="rss" size="50" value="<?php echo $rss; ?>" />
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>

            <hr />

            <h3>Footer</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="footer">Content:</label>
                    </th>
                    <td>
                        <?php
                        // Display editor
                        $args = array(
                            'media_buttons' => true,
                        );
                        wp_editor($footer, 'footer', $args);
                        ?>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>

            <input type="hidden" name="update" value="1" />
        </form>
    </div>
    <?php
}
?>