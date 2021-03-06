<?php

    namespace ActiTimberPackage\Handler;

    final class OptionsHandler
    {
        public function __construct()
        {
            add_action('init', [$this, 'addGeneralOptionPage']);
        }

        public function addGeneralOptionPage()
        {
            /* Create ACF global theme options */
            if (function_exists('acf_add_options_page')) {
                /* Admin menu general settings */
                $optionPageArgs = [
                    'page_title' => 'Options générales',
                    'menu_title' => 'Options générales',
                    'menu_slug' => 'theme-general-settings',
                    'capability' => 'edit_theme_settings'
                ];
                acf_add_options_page($optionPageArgs);
            }
        }
    }