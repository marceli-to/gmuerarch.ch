<?php
namespace App\Filters\Image\Template;
use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class Portrait implements ModifierInterface
{
    protected $max_width  = 640;    
    protected $max_height = 765;
    protected $maxSize;
    protected $coords;

    public function __construct($maxSize = NULL, $coords = FALSE, $ratio = NULL)
    {
        $this->maxSize = $maxSize ? $maxSize : 765;
        $this->coords = $coords;
    }

    public function apply(ImageInterface $image): ImageInterface
    {
        // Handle cropping if coordinates are provided
        if ($this->coords && $this->coords != '0,0,0,0')
        {
            list($cropWidth, $cropHeight, $cropX, $cropY) = explode(',', $this->coords);
            $image = $image->crop(
                floor($cropWidth), 
                floor($cropHeight), 
                floor($cropX), 
                floor($cropY)
            );
        }

        // Get dimensions
        $width  = $image->width();
        $height = $image->height();

        // For both landscape and portrait images, maintain aspect ratio while fitting within bounds
        return $image->coverDown($this->max_width, $this->max_height);
    }
}
