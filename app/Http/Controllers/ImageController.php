<?php
namespace App\Http\Controllers;
use App\Facades\ImageCache;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Config;

class ImageController extends Controller
{
    protected $maxSize;
    protected $coords;
    protected $ratio;
    
    /**
     * Get HTTP response of either original image file or
     * template applied file.
     *
     * @param  string $template
     * @param  string $filename
     * @param  string|null $maxSize
     * @param  string|null $coords
     * @param  bool $ratio
     * @return \Illuminate\Http\Response
     */
    public function getResponse($template, $filename, $maxSize = NULL, $coords = NULL, $ratio = FALSE)
    {
        $this->maxSize = $maxSize;
        $this->coords = $coords;
        $this->ratio = $ratio;

        switch (strtolower($template)) {
            case 'original':
                return $this->getOriginal($filename);

            case 'download':
                return $this->getDownload($filename);

            default:
                return $this->getImage($template, $filename);
        }
    }

    /**
     * Get cached image by template and filename
     *
     * @param string $template
     * @param string $filename
     * @return \Illuminate\Http\Response
     */
    protected function getImage($template, $filename)
    {
        // Get image path from cache or create new cached version
        $path = ImageCache::getCachedImage(
            $template, 
            $filename, 
            $this->maxSize, 
            $this->coords, 
            $this->ratio
        );

        if (!$path) {
            abort(404);
        }

        // Return image with proper headers
        return Response::file($path, [
            'Content-Type' => mime_content_type($path),
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }

    /**
     * Get the original image
     *
     * @param string $filename
     * @return \Illuminate\Http\Response
     */
    protected function getOriginal($filename)
    {
        foreach (Config::get('imagecache.paths') as $path) {
            $image_path = $path . '/' . $filename;
            if (file_exists($image_path)) {
                return Response::file($image_path, [
                    'Content-Type' => mime_content_type($image_path),
                    'Cache-Control' => 'public, max-age=31536000',
                ]);
            }
        }
        abort(404);
    }

    /**
     * Get the image as download
     *
     * @param string $filename
     * @return \Illuminate\Http\Response
     */
    protected function getDownload($filename)
    {
        foreach (Config::get('imagecache.paths') as $path) {
            $image_path = $path . '/' . $filename;
            if (file_exists($image_path)) {
                return Response::download($image_path);
            }
        }
        abort(404);
    }
}
