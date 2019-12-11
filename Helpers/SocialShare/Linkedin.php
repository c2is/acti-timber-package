<?php

namespace ActiTimberPackage\Helpers\SocialShare;

final class Linkedin extends SocialShare implements SocialShareInterface
{
    /**
     * Return Linkedin share url
     *
     * @param \WP_Post $post
     * @return string url
     */
    public function getShareUrl($post)
    {
        $postUrl = get_permalink($post);
        $linkedinUrl = sprintf('https://www.linkedin.com/shareArticle?mini=true&url=%1$s', $postUrl);

        return $linkedinUrl;
    }
}
