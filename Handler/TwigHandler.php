<?php

namespace ActiTimberPackage\Handler;

use DOMDocument;
use Timber\Twig_Function;
use Twig\Extension\StringLoaderExtension;

class TwigHandler
{
    /** Add timber support. */
    public function __construct()
    {
        add_filter('get_twig', [$this, 'addToTwig']);
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
