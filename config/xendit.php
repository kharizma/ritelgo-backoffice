<?php

return [
    'key_auth' => base64_encode(env('SECRET_KEY_XENDIT') . ':'),
    'redirect_url' => env('REDIRECT_URL'),
    'callback_url' => env('CALLBACK_URL'),
];