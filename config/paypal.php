<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

// return [
//     'mode' => env('PAYPAL_MODE', 'sandbox'), // sandbox or live
//     'sandbox' => [
//         'username' => env('PAYPAL_SANDBOX_API_USERNAME'),
//         'password' => env('PAYPAL_SANDBOX_API_PASSWORD'),
//         'secret' => env('PAYPAL_SANDBOX_API_SECRET'),
//         'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE'),
//         'app_id' => env('PAYPAL_SANDBOX_APP_ID'),
//         'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', ),
//     ],
//     'live' => [
//         'username' => env('PAYPAL_LIVE_API_USERNAME'),
//         'password' => env('PAYPAL_LIVE_API_PASSWORD'),
//         'secret' => env('PAYPAL_LIVE_API_SECRET'),
//         'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE'),
//         'app_id' => env('PAYPAL_LIVE_APP_ID'),
//     ],
//     'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'),
//     'currency' => env('PAYPAL_CURRENCY', 'USD'),
//     'notify_url' => env('PAYPAL_NOTIFY_URL'),
//     'locale' => env('PAYPAL_LOCALE', 'en_US'),
// ];



return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'),
    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
        'app_id'            => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id'            => '',
    ],
    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'),
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''),
    'locale'         => env('PAYPAL_LOCALE', 'en_US'),
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true),
];


