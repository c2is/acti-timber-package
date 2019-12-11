<?php

namespace ActiTimberPackage\Handler;

use ActiTimberPackage\Helper\CapabilitiesHelper;

final class CapabilitiesHandler
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
        CapabilitiesHelper::addCaps($actiCaps, $role);
    }
}
