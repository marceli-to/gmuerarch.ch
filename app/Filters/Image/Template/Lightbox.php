<?php
namespace App\Filters\Image\Template;
use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class Lightbox implements ModifierInterface
{
    /**
     * Maximum width for large landscape images
     */    
    protected $max_width = 2000;    

    /**
     * Maximum height for large portrait images
     */    
    protected $max_height = 1500;

    protected $maxSize;

    public function __construct($maxSize = NULL, $coords = FALSE, $ratio = NULL)
    {
        $this->maxSize = $maxSize ? $maxSize : 2000;
    }

    public function apply(ImageInterface $image): ImageInterface
    {
        // Get width and height
        $width  = $image->width();
        $height = $image->height();

        // For landscape images
        if ($width > $height && $width >= $this->max_width)
        {
            return $image->scaleDown(width: $this->max_width);
        }
        // For portrait images
        else if ($height >= $this->max_height)
        {
            return $image->scaleDown(height: $this->max_height);
        }

        return $image;
    }
}
