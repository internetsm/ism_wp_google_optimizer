<?php

add_action('admin_menu', function () {

    add_menu_page('Ism Google Optimizer', 'Ism Google Optimizer', 'manage_options', 'ism_google_optimizer', function () {

        $url = site_url('/');

        file_get_contents($url . '?_ism_google_optimizer_styles=1');

        $ismStyles = get_option('_ism_google_optimizer_styles');
        $ismFooterStyles = get_option('_ism_google_optimizer_styles_footer');
        if (!$ismFooterStyles) {
            $ismFooterStyles = [];
        }

        $styleToAdd = isset($_POST['style']) ? $_POST['style'] : null;

        if ($styleToAdd) {

            $ismFooterStyles[] = $styleToAdd;

            update_option('_ism_google_optimizer_styles_footer', $ismFooterStyles);
        }

        echo ism_google_optimizer_get_template('admin/index', [
            'ism_styles'        => $ismStyles,
            'ism_footer_styles' => $ismFooterStyles,
        ]);
    });
});