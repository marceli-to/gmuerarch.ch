<?php
namespace App\Filters\Image\Template;
use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class Thumbnail implements ModifierInterface
{
    protected $size = 300;
    protected $maxSize;
    protected $coords;

    public function __construct($maxSize = NULL, $coords = FALSE, $ratio = NULL)
    {
        $this->maxSize = $maxSize ? $maxSize : $this->size;
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

        // Create a square thumbnail
        return $image->coverDown($this->maxSize, $this->maxSize);
    }
}