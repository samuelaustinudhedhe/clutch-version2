<?php

if (!function_exists("session_driver")) {

    function session_driver(): string
    {
        /*
        |--------------------------------------------------------------------------
        | Default Session Driver
        |--------------------------------------------------------------------------
        |
        | This option determines the default session driver that is utilized for
        | incoming requests. Laravel supports a variety of storage options to
        | persist session data. Database storage is a great default choice.
        |
        | Supported: "file", "cookie", "", "apc",
        |            "memcached", "redis", "dynamodb", "array"
        |
        */
        return env('SESSION_DRIVER', 'database');
    }
}