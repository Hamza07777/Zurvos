<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'jwt',
            'provider' => 'customers',
            'hash' => false,
        ],
         'gym' => [
            'driver' => 'session',
            'provider' => 'gyms',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'influence' => [
            'driver' => 'session',
            'provider' => 'customer',
        ],
        'vendor' => [
            'driver' => 'session',
            'provider' => 'vendor',
        ],
        'partner' => [
            'driver' => 'session',
            'provider' => 'partner',
        ],
        'gym_manager' => [
            'driver' => 'session',
            'provider' => 'gym_manager',
        ],
        
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Customer::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
        'gyms' => [
            'driver' => 'eloquent',
            'model' => App\Gym::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
        'customer' => [
            'driver' => 'eloquent',
            'model' => App\Customer::class
        ],
        'vendor' => [
            'driver' => 'eloquent',
            'model' => App\Vendors::class
        ],
        'partner' => [
            'driver' => 'eloquent',
            'model' => App\Partner::class
        ],
        'gym_manager' => [
            'driver' => 'eloquent',
            'model' => App\gym_manager::class
        ],
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'customers' => [
            'provider' => 'customers',
            'table' => 'password_resets',
            'expire' => 60000,
            'throttle' => 60000,
        ],
          'gyms' => [
            'provider' => 'gyms',
            'table' => 'password_resets',
            'expire' => 60000,
            'throttle' => 60000,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60000,
            'throttle' => 60000,
        ],
        'influences' => [
            'provider' => 'customer',
            'table' => 'customer_password_resets',
            'expire' => 60,
        ],
          'vendors' => [
            'provider' => 'vendor',
            'table' => 'customer_password_resets',
            'expire' => 60,
        ],

        'partners' => [
            'provider' => 'partner',
            'table' => 'customer_password_resets',
            'expire' => 60,
        ],
        'gym_managers' => [
            'provider' => 'gym_manager',
            'table' => 'customer_password_resets',
            'expire' => 60,
        ],
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
