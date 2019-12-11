<?php

/**
 * Plugin Name: Acti Timber Package
 * Description: Ajoute des classes utiles à la conception des sites Acti sous Timber
 * Version: 1.0.0
 * Author: Acti
 */

  use ActiTimberPackage\Handler\Capabilities;
  use ActiTimberPackage\Handler\Context;
  use ActiTimberPackage\Handler\Options;
  use ActiTimberPackage\Handler\TimberLoader;
  use ActiTimberPackage\Handler\Twig;

add_action('muplugins_loaded', 'initActiTimberPackageProcess');
function initActiTimberPackageProcess()
{
    new TimberLoader();
    new Capabilities();
    new Context();
    new Options();
    new Twig();
}
