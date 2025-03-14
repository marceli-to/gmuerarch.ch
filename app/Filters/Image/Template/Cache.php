<?php
namespace App\Filters\Image\Template;
use Intervention\Image\Interfaces\ImageInterface;
use Intervention\Image\Interfaces\ModifierInterface;

class Cache implements ModifierInterface
{
    protected $maxSize;
    protected $coords = FALSE;
    protected $hasCrop = FALSE;
    protected $cropWidth = NULL;
    protected $cropHeight = NULL;
    protected $cropX = NULL;
    protected $cropY = NULL;
    protected $ratio;
    protected $orientation = 'landscape';

    public function __construct($maxSize = NULL, $coords = FALSE, $ratio = NULL)
    {
        $this->maxSize   = $maxSize ? $maxSize : 1500;
        $this->coords    = $coords;
        $this->ratio     = $ratio;
    }

    public function apply(ImageInterface $image): ImageInterface
    {
        // Get image orientation based on image width/height
        $width  = $image->width();
        $height = $image->height();
        if ($height >= $width)
        {
            $this->orientation = 'portrait';
        }

        // Set crop variables && overwrite image orientation if needed
        if ($this->coords && $this->coords != '0,0,0,0')
        {
            list($this->cropWidth, $this->cropHeight, $this->cropX, $this->cropY) = explode(',', $this->coords);
            $this->orientation = $this->cropHeight >= $this->cropWidth ? 'portrait' : 'landscape';
            $this->hasCrop = TRUE;
        }

        if ($this->hasCrop)
        {
            // First crop the image
            $image = $image->crop(
                floor($this->cropWidth), 
                floor($this->cropHeight), 
                floor($this->cropX), 
                floor($this->cropY)
            );

            // Then scale down based on orientation
            if ($this->orientation == 'landscape')
            {
                return $image->scaleDown(width: $this->maxSize);
            }
            else
            {
                return $image->scaleDown(height: $this->maxSize);
            }
        }
        else
        {
            if ($this->ratio)
            {
                $ratio = explode('x', $this->ratio);

                if ($ratio[0] > $ratio[1])
                {
                    $x = $this->maxSize;
                    $y = $this->maxSize / $ratio[0] * $ratio[1];
                }
                else
                {
                    $y = $this->maxSize;
                    $x = $this->maxSize / $ratio[1] * $ratio[0];
                }

                // For landscape orientation
                if ($this->orientation == 'landscape')
                {
                    return $image->coverDown(floor($x), floor($y));
                }

                // For portrait orientation (switch x and y)
                return $image->coverDown(floor($y), floor($x));
            }

            // If no ratio specified, maintain aspect ratio while fitting within maxSize
            if ($this->orientation == 'landscape')
            {
                return $image->scaleDown(width: $this->maxSize);
            }
            else
            {
                return $image->scaleDown(height: $this->maxSize);
            }
        }
    }
}