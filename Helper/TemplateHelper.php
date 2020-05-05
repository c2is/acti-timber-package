<?php

namespace ActiTimberPackage\Helper;

final class TemplateHelper
{
    /**
     * Retrieve page url from template
     *
     * @param $template string template name
     * @return null|string url of post
     */
    public static function getTemplatePageUrl($template)
    {
        $url = null;
        $args = [
            'post_type' => 'page',
            'nopaging' => true,
            'post_status' => ['publish', 'private'],
            'suppress_filters'  => 0,
            'meta_key' => '_wp_page_template',
            'meta_value' => $template
        ];

        $pages = get_posts($args);
        if (!empty($pages)) {
            $url = get_permalink($pages[0]);
        }

        return $url;
    }

    /**
     * Retrieve post object from template
     *
     * @param $template string template name
     * @return null|\WP_Post post object
     */
    public static function getTemplatePageObject($template)
    {
        $postObject = null;
        $args = [
            'post_type' => 'page',
            'nopaging' => true,
            'post_status' => ['publish', 'private'],
            'suppress_filters'  => 0,
            'meta_key' => '_wp_page_template',
            'meta_value' => $template
        ];

        $pages = get_posts($args);
        if (!empty($pages)) {
            $postObject = $pages[0];
        }

        return $postObject;
    }

    /**
     * Retrieve post ID from template
     *
     * @param $template string template name
     * @return null|int post ID
     */
    public static function getTemplatePageId($template)
    {
        $postID = null;
        $args = [
            'post_type' => 'page',
            'nopaging' => true,
            'post_status' => ['publish', 'private'],
            'suppress_filters'  => 0,
            'fields' => 'ids',
            'meta_key' => '_wp_page_template',
            'meta_value' => $template
        ];

        $ids = get_posts($args);
        if (!empty($ids)) {
            $postID = $ids[0];
        }

        return $postID;
    }

    /**
     * Retrieve post ID from template
     *
     * @param $template string template name
     * @return array post IDs
     */
    public static function getTemplatePageIds($template)
    {
        $postID = null;
        $args = [
            'post_type' => 'page',
            'nopaging' => true,
            'post_status' => ['publish', 'private'],
            'suppress_filters'  => 0,
            'fields' => 'ids',
            'meta_key' => '_wp_page_template',
            'meta_value' => $template
        ];

        return get_posts($args);
    }
}