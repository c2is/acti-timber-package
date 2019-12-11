<?php

namespace ActiTimberPackage\Handler;

use ActiTimberPackage\Helper\SocialShare\SocialShareHelper;

final class ContextHandler
{
    public function __construct()
    {
        add_action('timber/context', array($this, 'addSocialShareToContext'));
    }

    public function addSocialShareToContext()
    {
        $socialShareClass = new SocialShareHelper();
        $context['acti_social_share'] = $socialShareClass;

        return $context;
    }
}
