<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Service Author
    |--------------------------------------------------------------------------
    |
    | Each panel installation is assigned a unique UUID to identify the
    | author of custom services, and make upgrades easier by identifying
    | standard Pterodactyl shipped services.
    */
    'service' => [
        'core' => 'ptrdctyl-v040-11e6-8b77-86f30ca893d3',
        'author' => env('SERVICE_AUTHOR'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    |
    | Certain pagination result counts can be configured here and will take
    | effect globally.
    */
    'paginate' => [
        'frontend' => [
            'servers' => 15,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Guzzle Connections
    |--------------------------------------------------------------------------
    |
    | Configure the timeout to be used for Guzzle connections here.
    */
    'guzzle' => [
        'timeout' => env('GUZZLE_TIMEOUT', 5),
        'connect_timeout' => env('GUZZLE_CONNECT_TIMEOUT', 3),
    ],

];
