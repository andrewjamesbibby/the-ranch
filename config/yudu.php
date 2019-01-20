<?php

return [

    /*
    |--------------------------------------------------------------------------
    | YUDU REST API KEY
    |--------------------------------------------------------------------------
    | The key is used for identification and passed as an 'Authentication'
    | header in all requests to the YUDU API
    */

    'key' => env('YUDU_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | YUDU REST API SHARED SECRET
    |--------------------------------------------------------------------------
    |
    |  The shared secret is used to sign each request to the YUDU API.
    |
    */

    'secret' => env('YUDU_SECRET', null),

];