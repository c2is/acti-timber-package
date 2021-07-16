<?php

namespace ActiTimberPackage\Helper\SocialShare;

final class Pinterest extends SocialShareHelper implements SocialShareInterface
{
    /**
     * Return Facebook share url
     *
     * @param \WP_Post $post
     * @return string url
     */
    public function getShareUrl($post)
    {
        $postUrl = get_permalink($post);
        $pinterestUrl = sprintf('http://pinterest.com/pin/create/link/?url=%1$s', $postUrl);

        return $pinterestUrl;
    }
}
