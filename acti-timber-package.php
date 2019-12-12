<?php

    /**
     * Plugin Name: Acti Timber Package
     * Description: Ajoute des classes utiles à la conception des sites Acti sous Timber
     * Version: 1.0.0
     * Author: Acti
     */

    use ActiTimberPackage\Handler\CapabilitiesHandler;
    use ActiTimberPackage\Handler\ContextHandler;
    use ActiTimberPackage\Handler\OptionsHandler;
    use ActiTimberPackage\Handler\LoaderHandler;
    use ActiTimberPackage\Handler\SvgHandler;
    use ActiTimberPackage\Handler\TwigHandler;
    use Timber\Timber;

    add_action('muplugins_loaded', 'initActiTimberPackageProcess');
    add_action('after_setup_theme', 'initActiTimberPackageSite');

function initActiTimberPackageProcess()
{
    new CapabilitiesHandler();
    new ContextHandler();
    new OptionsHandler();
    new TwigHandler();
    new SvgHandler();
}

function initActiTimberPackageSite()
{
    new Timber();
    if (!class_exists('Timber')) {
        add_action('admin_notices', function () {
            echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
        });

        return;
    }

    /**
     * Sets the directories (inside your theme) to find .twig files
     */
    Timber::$dirname = array('templates', 'views');

    /**
     * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
     * No prob! Just set this value to true
     */
    Timber::$autoescape = false;

    new LoaderHandler();
}
