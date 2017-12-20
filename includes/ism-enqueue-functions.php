<?php


use IsmGoogleOptimizer\Helper\OptionHelper;

add_action('admin_footer', function () {

    wp_enqueue_style('ism-google-optimizer-admin', ISM_GOOGLE_OPTIMIZER_URL . '/assets/ism-google-optimizer.css');
});

add_action('wp_enqueue_scripts', function () {

    global $wp_styles;

    global $wp_scripts;

    if (isset($_GET['_ism_google_optimizer_styles'])) {

        $ismStyles = [];

        $registeredStyles = $wp_styles->registered;

        foreach ($registeredStyles as $handle => $style) {

            $ismStyles[] = $handle;
        }

        OptionHelper::setEnqueuedStyles($ismStyles);

        $adminUrl = admin_url('/admin.php?page=ism_google_optimizer');

        wp_redirect($adminUrl);
    }

    $ismFooterStyles = OptionHelper::getFooterStyles();

    foreach ($ismFooterStyles as $ismFooterStyle) {

        wp_dequeue_style($ismFooterStyle);
    }

}, 99999);

add_action('get_footer', function () {

    $ismFooterStyles = OptionHelper::getFooterStyles();

    foreach ($ismFooterStyles as $ismFooterStyle) {

        wp_enqueue_style($ismFooterStyle);
    }
});