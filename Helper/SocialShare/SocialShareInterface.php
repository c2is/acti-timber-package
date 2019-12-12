<?php

namespace ActiTimberPackage\Helper\SocialShare;

interface SocialShareInterface
{
    /**
     * Return social share url
     * @param $post \WP_Post
     * @return string url
     */
    public function getShareUrl($post);
}
