<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Interfaces\ImageInterface;
use App\Models\Image;

class ImageCache
{
    /**
     * Cache directory
     */
    protected $cachePath;

    /**
     * Original images directory
     */
    protected $imagePath;

    /**
     * Image manager instance
     */
    protected $manager;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cachePath = storage_path('app/public/cache');
        $this->imagePath = storage_path('app/public/uploads');
        $this->manager = new ImageManager(new Driver());
        
        // Create cache directory if it doesn't exist
        if (!File::exists($this->cachePath)) {
            File::makeDirectory($this->cachePath, 0755, true);
        }
    }

    /**
     * Get cached image
     *
     * @param string $template
     * @param string $filename
     * @param int|null $maxSize
     * @param string|null $coords
     * @param string|null $ratio
     * @return string|null
     */
    public function getCachedImage($template, $filename, $maxSize = null, $coords = null, $ratio = null)
    {
        // Generate cache key
        $cacheKey = $this->generateCacheKey($template, $filename, $maxSize, $coords, $ratio);
        
        // Full path to the cached file
        $cachedImagePath = $this->cachePath . '/' . $cacheKey;
        
        // Check if cached file exists
        if (File::exists($cachedImagePath)) {
            return $cachedImagePath;
        }
        
        // Check all configured paths for the original image
        $originalImagePath = null;
        foreach (Config::get('imagecache.paths') as $path) {
            $testPath = $path . '/' . $filename;
            if (File::exists($testPath)) {
                $originalImagePath = $testPath;
                break;
            }
        }
        
        // If no original file found
        if (!$originalImagePath) {
            return null;
        }
        
        // Process image with template
        $image = $this->applyTemplate($template, $originalImagePath, $maxSize, $coords, $ratio);
        
        // Save processed image to cache
        $image->save($cachedImagePath);
        
        return $cachedImagePath;
    }

    /**
     * Apply template to image
     *
     * @param string $template
     * @param string $path
     * @param int|null $maxSize
     * @param string|null $coords
     * @param string|null $ratio
     * @return ImageInterface
     */
    protected function applyTemplate($template, $path, $maxSize = null, $coords = null, $ratio = null)
    {
        // Load image using ImageManager
        $image = $this->manager->read($path);
        
        // Get template class
        $templateClass = $this->getTemplateClass($template);
        
        if (!$templateClass) {
            return $image;
        }
        
        // Create template instance with parameters
        $templateInstance = new $templateClass($maxSize, $coords, $ratio);
        
        // Apply template
        return $templateInstance->apply($image);
    }

    /**
     * Get template class
     *
     * @param string $template
     * @return string|null
     */
    protected function getTemplateClass($template)
    {
        $className = 'App\\Filters\\Image\\Template\\' . ucfirst($template);
        
        if (class_exists($className)) {
            return $className;
        }
        
        return null;
    }

    /**
     * Generate cache key
     *
     * @param string $template
     * @param string $filename
     * @param int|null $maxSize
     * @param string|null $coords
     * @param string|null $ratio
     * @return string
     */
    protected function generateCacheKey($template, $filename, $maxSize = null, $coords = null, $ratio = null)
    {
        // Create a unique hash based on template, filename and params
        $hash = md5($template . $filename . $maxSize . $coords . $ratio);
        
        // Get file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        
        // Return cache key
        return $hash . '.' . $extension;
    }

    /**
     * Clear cache for a specific image
     *
     * @param \App\Models\Image $image
     * @return void
     */
    public function clearImageCache($image)
    {
        // Clear all cached versions of this image
        $templates = Config::get('imagecache.templates');
        foreach ($templates as $template => $class) {
            // Build coords string from individual fields
            $coords = implode(',', [
                $image->coords_w ?? 0,
                $image->coords_h ?? 0,
                $image->coords_x ?? 0,
                $image->coords_y ?? 0
            ]);
            
            // Generate cache key
            $cacheKey = $this->generateCacheKey($template, $image->name, null, $coords, $image->ratio);
            $cachedPath = $this->cachePath . '/' . $cacheKey;
            
            if (File::exists($cachedPath)) {
                File::delete($cachedPath);
            }
        }
    }

    /**
     * Clear all image cache
     *
     * @return void
     */
    public function clearAllCache()
    {
        if (File::exists($this->cachePath)) {
            File::cleanDirectory($this->cachePath);
        }
    }
}
