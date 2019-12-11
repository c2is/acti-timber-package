<?php

namespace ActiTimberPackage\Helper\SocialShare;

class SocialShareHelper
{
    /**
     * ActiSocialShare constructor.
     */
    public function __construct()
    {
    }

    public function getFeed($feed)
    {
        $className = '\SocialShare\\';
        $className .= ucfirst($feed);
        $socialShareClass = new $className();

        return $socialShareClass;
    }
}
