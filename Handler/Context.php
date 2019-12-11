<?php

namespace ActiTimberPackage\Handler;

use ActiTimberPackage\Helpers\SocialShare\SocialShare;

final class Context
{
    public function __construct()
    {
        add_action('timber/context', array($this, 'addSocialShareToContext'));
    }

    public function addSocialShareToContext()
    {
        $socialShareClass = new SocialShare();
        $context['acti_social_share'] = $socialShareClass;

        return $context;
    }
}
