<?php

namespace ActiTimberPackage\Handler;

final class Capabilities
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'addAdministratorCapabilities']);
    }

    public function addAdministratorCapabilities()
    {
        $role = get_role('administrator');

        /* Capabilities to edit admin general theme settings and others */
        $actiCaps = array(
          'edit_theme_settings'
        );
        \ActiTimberPackage\Helpers\Capabilities::addCaps($actiCaps, $role);
    }
}
