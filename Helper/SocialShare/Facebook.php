<?php

namespace ActiTimberPackage\Helpers\SocialShare;

final class Facebook extends SocialShareHelper implements SocialShareInterface
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
        $facebookUrl = sprintf('https://www.facebook.com/sharer/sharer.php?u=%1$s', $postUrl);

        return $facebookUrl;
    }
}
