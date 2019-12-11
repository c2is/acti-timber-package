<?php

namespace ActiTimberPackage\Handler;

final class SvgHandler
{
    public function __construct()
    {
        add_action('admin_head', [$this, 'fixSvg']);
        add_filter('wp_check_filetype_and_ext', [$this, 'addSvgFileType'], 10, 4);
        add_filter('upload_mimes', [$this, 'addSvgMimeType']);
    }

    public function addSvgFileType($data, $file, $filename, $mimes)
    {
        $filetype = wp_check_filetype($filename, $mimes);

        return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
        ];
    }

    public function addSvgMimeType($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    public function fixSvg()
    {
        echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
          width: 100% !important;
          height: auto !important;
          }
          </style>';
    }
}
