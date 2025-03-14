<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Facades\ImageCache;

class ImageCacheController extends Controller
{
    /**
     * Get cached image by template and filename
     *
     * @param string $template
     * @param string $filename
     * @return \Illuminate\Http\Response
     */
    public function getImage($template, $filename)
    {
        // Get image path from cache or create new cached version
        $path = ImageCache::getCachedImage($template, $filename);

        if (!$path) {
            abort(404);
        }

        // Return image with proper headers
        return Response::file($path, [
            'Content-Type' => mime_content_type($path),
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }
}
