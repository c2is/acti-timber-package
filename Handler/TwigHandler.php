<?php

namespace ActiTimberPackage\Handler;

use DOMDocument;
use Timber\Twig_Function;
use Twig\Extension\StringLoaderExtension;
use WPML\Core\Twig_Loader_Filesystem;

class TwigHandler
{
    /** Add timber support. */
    public function __construct()
    {
        add_filter('timber/loader/loader', [$this, 'addPathToTwig']);
        add_filter('get_twig', [$this, 'addToTwig']);
    }

    /**
     * @param $loader Twig_Loader_Filesystem
     * @return mixed
     * @throws \WPML\Core\Twig\Error\LoaderError
     */
    public function addPathToTwig($loader)
    {
        $loader->addPath(WPMU_PLUGIN_DIR . '/acti-timber-package/Templates', 'acti_helper');
        return $loader;
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     * @return string
     */
    public function addToTwig($twig)
    {
        $twig->addExtension(new StringLoaderExtension());
        $twig->addFunction(new Twig_Function('acti_get_svg', [$this, 'svgUrlGetContent']));
        $twig->addFunction(new Twig_Function('acti_picture', '\ActiTimberPackage\Helper\PictureHelper::create'));

        return $twig;
    }

    /* Get svg content */
    public function svgUrlGetContent($svg)
    {
        $iconfile = new DOMDocument();
        $iconfile->load($svg);

        return $iconfile->saveHTML($iconfile->getElementsByTagName('svg')[0]);
    }
}
