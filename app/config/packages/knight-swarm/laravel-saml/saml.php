<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | laravel-saml config file
    |--------------------------------------------------------------------------
    |
    | Here you need to specify a working phpsimplesaml install working as
    | a Service Provider already connected (or acting like) a Identity provider
    |
    */


    /*
     * The path to the working phpsimplesaml install
     */
    //'sp_path' => public_path()."/serviceproviderpath",
    'sp_path' => "/var/www/simplesamlphp/",


    /*
     * Authenticate as...
     */
    'default_sp' => 'default_sp', 

    'logout_target' => 'http://saml.dev',



);