<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | User type (Roles)
    |--------------------------------------------------------------------------
    |
    */

    'role_sales_manager' => env('SALES_APP_ROLE_MANAGER', 1),
    'role_guest' => env('SALES_APP_ROLE_GUEST', 2),

];
