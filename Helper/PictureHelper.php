<?php

namespace ActiTimberPackage\Helper;

use Timber\ImageHelper;
use Timber\Timber;

final class PictureHelper
{
    /**
     * Generate picture tag with image src
     *
     * @param $src string
     * @param $sizes array
     * @param $class string
     * @param $alt string
     * @param $retina array
     */
    public static function create($src, $sizes, $retina, $class = null, $alt = null)
    {
        $templateLocation = WPMU_PLUGIN_DIR . '/acti-timber-package/Templates/picture/base.twig';

        $imageHelper = new ImageHelper();
        $jpgImage = $imageHelper->img_to_jpg($src);
        $resizes = [];
        foreach ($sizes as $size => $args) {
            $resizes[$size] = [
                'min'   => $args['min'],
                'max'   => $args['max'],
                'src'   => $imageHelper->resize($jpgImage, $args['resize'][0], $args['resize'][1])
            ];
        }

        $context = Timber::get_context();
        $context['acti_picture_src'] = $jpgImage;
        $context['acti_picture_sizes'] = $resizes;
        $context['acti_picture_retina'] = $retina;
        $context['acti_picture_class'] = $class;
        $context['acti_picture_alt'] = $alt;

        Timber::render($templateLocation, $context);
    }
}
