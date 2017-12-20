<?php

use IsmGoogleOptimizer\Helper\OptionHelper;

add_action('admin_menu', function () {

    add_menu_page('Ism Google Optimizer', 'Ism Google Optimizer', 'manage_options', 'ism_google_optimizer', function () {

        $url = site_url('/') . '?_ism_google_optimizer_styles=1';

        $ismStyles = OptionHelper::getEnqueuedStyles();

        $ismFooterStyles = OptionHelper::getFooterStyles();

        $styleToAdd = isset($_POST['add_styles']) ? $_POST['add_styles'] : [];

        foreach ($styleToAdd as $style) {

            $ismFooterStyles[] = $style;

            $ismFooterStyles = array_unique($ismFooterStyles);

            OptionHelper::setFooterStyles($ismFooterStyles);
        }

        $stylesToRemove = isset($_POST['drop_styles']) ? $_POST['drop_styles'] : [];

        foreach ($stylesToRemove as $style) {

            $key = array_search($style, $ismFooterStyles);

            unset($ismFooterStyles[$key]);

            $ismFooterStyles = array_values($ismFooterStyles);

            OptionHelper::setFooterStyles($ismFooterStyles);
        }

        echo ism_google_optimizer_get_template('admin/index', [
            'ism_styles'        => $ismStyles,
            'ism_footer_styles' => $ismFooterStyles,
            'generate_url'      => $url,
        ]);
    });
});