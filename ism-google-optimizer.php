<?php
/*
Plugin Name: Ism Google Optimizer
Plugin URI: #
Description: Ism Google Optimizer
Version: 1.0.0
Author: #
Author URI: #
License: MIT
*/

require_once __DIR__ . "/includes/ism-menu-page.php";

add_action('wp_enqueue_scripts', function () {

    global $wp_styles;

    global $wp_scripts;

    if (isset($_GET['_ism_google_optimizer_styles'])) {

        $ismStyles = [];

        $registeredStyles = $wp_styles->registered;

        foreach ($registeredStyles as $handle => $style) {

            $ismStyles[] = $handle;
        }

        update_option('_ism_google_optimizer_styles', $ismStyles);
    }

    $ismFooterStyles = get_option('_ism_google_optimizer_styles_footer');

    if (!$ismFooterStyles) {

        $ismFooterStyles = [];
    }

    foreach ($ismFooterStyles as $ismFooterStyle) {

        wp_dequeue_style($ismFooterStyle);
    }

}, 99999);


add_action('get_footer', function () {

    $ismFooterStyles = get_option('_ism_google_optimizer_styles_footer');

    if (!$ismFooterStyles) {

        $ismFooterStyles = [];
    }

    foreach ($ismFooterStyles as $ismFooterStyle) {

        wp_enqueue_style($ismFooterStyle);
    }
});

if (!function_exists("ism_google_optimizer_get_template")) {

    /**
     * Get template
     *
     * @param $slug
     * @param $args
     * @return string
     * @throws Exception
     */
    function ism_google_optimizer_get_template($slug, $args = [])
    {
        $templatePathSelected = null;
        $templatePaths = [
            __DIR__ . "/templates/{$slug}.php",
            get_stylesheet_directory() . "/ism_google_optimizer/{$slug}.php",
        ];
        foreach ($templatePaths as $templatePath) {
            if (file_exists($templatePath)) {
                $templatePathSelected = $templatePath;
            }
        }
        if (!$templatePathSelected) {
            throw new Exception("ism_google_optimizer_get_template template not found");
        }
        ob_start();
        extract($args);
        include $templatePathSelected;
        return ob_get_clean();
    }
}
