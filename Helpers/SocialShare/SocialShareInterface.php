<?php

namespace ActiTimberPackage\Helpers\SocialShare;

interface SocialShareInterface
{
    /**
     * Return social share url
     * @param $post \WP_Post
     * @return string url
     */
    public function getShareUrl($post);
}
