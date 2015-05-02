<?php

/**
 * Stripe configuration
 */

return [
    'secret_key' => env('SECRET_KEY', 'your Stripe secret key'),
    'publishable_key' => env('PUBLISHABLE_KEY', 'your Stripe publishable key'),
];
