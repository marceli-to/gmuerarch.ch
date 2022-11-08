<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Company name
  |--------------------------------------------------------------------------
  |
  */

  'company' => env('GMUER_COMPANY_NAME', 'Silvia Gmür Reto Gmür Architekten '),

  /*
  |--------------------------------------------------------------------------
  | E-Mail settings
  |--------------------------------------------------------------------------
  |
  */

  'email' => [
    'from' => env('GMUER_MAIL_FROM', 'marcel@jamon.digital'),
    'recipient' => env('GMUER_MAIL_RECIPIENT', 'm@marceli.to'),
    'bcc' => env('GMUER_MAIL_BCC', 'm@marceli.to'),
    'recipient_test' => env('GMUER_MAIL_RECIPIENT_TEST', 'm@marceli.to')
  ],

  /*
  |--------------------------------------------------------------------------
  | Domain
  |--------------------------------------------------------------------------
  |
  */

  'domain' => env('GMUER_DOMAIN', 'https://gmuerarch.ch'),

  /*
  |--------------------------------------------------------------------------
  | Chunk size for cron jobs
  |--------------------------------------------------------------------------
  |
  */

  'cron_chunk_size' => 3,
]
?>