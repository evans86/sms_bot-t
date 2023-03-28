<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'key_activate' => [
        'key_activate' => env('SIM_ACTIVATE_KEY'),
        'key_5sim' => 'eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MTE0ODU3NzcsImlhdCI6MTY3OTk0OTc3NywicmF5IjoiZTJiYWM2MDBlZWE1Mjg1YWZmMTgzZTVjYzk2Mjk5NDkiLCJzdWIiOjE1Mzg1MjN9.pyTe9aYLcrT3cINmvzG2WdcNJFW1eDRE-9KftCp9bz_3wfv67QtjHElhpqMknS71v1hjE3qu9dInBYOPzAGUBJEw7gUOzqrgsTCkqQlS_zSbWYxDUihXpbsG43-2jKDRwq8LB4jxCxykLajqbpMe_7YSdyj1aaem9W5QHpKtKKxRXlODSa9UoOlNSobh4ELnUS7Q2iwnyVYnp-2iboCsMbmUA9NpHZuUDUEhgX4fccu1TLNjAcRULamkng4DJaCeM24Mjvic2Dh3Om5ZHdJPTrsgc7cav213kDE2kClcF_xAOlN6naryCR3Y6DM2R0efe9HNDBvwF-IVyJZAxOkleg',
        'ref_activate' => 5245236,
    ],

];
