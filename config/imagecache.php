<?php

return array(

  /*
  |--------------------------------------------------------------------------
  | Name of route
  |--------------------------------------------------------------------------
  |
  | Enter the routes name to enable dynamic imagecache manipulation.
  | This handle will define the first part of the URI:
  |
  | {route}/{template}/{filename}
  |
  | Examples: "images", "img/cache"
  |
  */

  'route' => 'img',

  /*
  |--------------------------------------------------------------------------
  | Storage paths
  |--------------------------------------------------------------------------
  |
  | The following paths will be searched for the image filename, submitted
  | by URI.
  |
  | Define as many directories as you like.
  |
  */

  'paths' => array(
    public_path('upload'),
    public_path('images'),
    storage_path('app/public/uploads')
  ),

  /*
  |--------------------------------------------------------------------------
  | Manipulation templates
  |--------------------------------------------------------------------------
  |
  | Here you may specify your own manipulation filter templates.
  | The keys of this array will define which templates
  | are available in the URI:
  |
  | {route}/{template}/{filename}
  |
  | The values of this array will define which filter class
  | will be applied, by its fully qualified name.
  |
  */

  'templates' => array(
    'small' => 'App\Filters\Image\Template\Small',
    'large' => 'App\Filters\Image\Template\Large',
    'lightbox' => 'App\Filters\Image\Template\Lightbox',
    'cache' => 'App\Filters\Image\Template\Cache',
    'thumbnail' => 'App\Filters\Image\Template\Thumbnail',
    'tiny' => 'App\Filters\Image\Template\Tiny',
    'portrait' => 'App\Filters\Image\Template\Portrait',
  ),

  /*
  |--------------------------------------------------------------------------
  | Image Cache Lifetime
  |--------------------------------------------------------------------------
  |
  | Lifetime in minutes of the images handled by the imagecache route.
  |
  */

  'lifetime' => 43200,

);
