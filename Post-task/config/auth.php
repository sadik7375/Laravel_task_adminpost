<?php

return [

   // config/auth.php

   'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
],


'providers' => [
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\AdminModel::class, // Check that this is the correct model
    ],
],


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

  
    // 'guards' => [
    //     'web' => [
    //         'driver' => 'session',
    //         'provider' => 'users',
    //     ],
    // ],

 

    // 'providers' => [
    //     'users' => [
    //         'driver' => 'eloquent',
    //         'model' => App\Models\AdminModel::class,
    //     ],

    //     // 'users' => [
    //     //     'driver' => 'database',
    //     //     'table' => 'users',
    //     // ],
    // ],

    

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

  
 

    'password_timeout' => 10800,

];

