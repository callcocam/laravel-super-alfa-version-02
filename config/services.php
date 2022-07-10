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

    'simplus' => [
        'endpoint_sandbox' => env('SIMPLUS_ENDPOINT_SANDBOX_URL','https://demo-api-v4.simplustec.com.br/'),
        'endpoint_production' => env('SIMPLUS_ENDPOINT_PRODUCTION_URL','https://prod-api-v4.simplustec.com.br/'),
        'username' => env('SIMPLUS_EMAIL','api.simplus@cooperalfa.com.br'),
        'password' => env('SIMPLUS_PASSWORD','gzzQjACfSNPcMFOfeJem2e3'),
        'sandbox' => env('SIMPLUS_SANDBOX',false),
    ],

];
