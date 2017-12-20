<?php

namespace IsmGoogleOptimizer\Helper;

/**
 * Created by PhpStorm.
 * User: michele
 * Date: 20/12/17
 * Time: 11.21
 */
class OptionHelper
{
    const ENQUEUED_STYLES_KEY = "_ism_google_optimizer_styles";

    const FOOTER_STYLES_KEY = "_ism_google_optimizer_styles_footer";

    /**
     * @return array
     */
    public static function getEnqueuedStyles()
    {
        $styles = get_option(self::ENQUEUED_STYLES_KEY, []);

        return $styles;
    }

    /**
     * @param array
     */
    public static function setEnqueuedStyles($styles)
    {
        update_option(self::ENQUEUED_STYLES_KEY, $styles);
    }

    /**
     * @return array
     */
    public static function getFooterStyles()
    {
        $styles = get_option(self::FOOTER_STYLES_KEY, []);

        return $styles;
    }

    /**
     * @param array
     */
    public static function setFooterStyles($styles)
    {
        update_option(self::FOOTER_STYLES_KEY, $styles);
    }
}