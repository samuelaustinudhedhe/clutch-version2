<?php 


return [
    /*
     | Set trusted proxy IP addresses.
     |
     | Both IPv4 and IPv6 addresses are supported, along with CIDR notation.
     |
     | The "*" character is syntactic sugar within TrustedProxy to trust any proxy
     | that connects directly to your server, a requirement when you cannot know
     | the address of your proxy (e.g. if using ELB or similar).
     */
    'proxies' => env('TRUSTED_PROXIES', null),

    /*
    | To trust one or more specific proxies that connect directly to your server,
    | use an array of IP addresses:
     */
    // 'proxies' => ['192.168.1.1', '192.168.1.2'],

    /*
     | Or, to trust all proxies that connect directly to your server, use a "*"
     */
    // 'proxies' => '*',

    /*
     | Or, to trust all proxies that connect directly to your server, use "**"
     | (this will trust not just the first proxy that connects to your server, but
     | all proxies that connect to that proxy, and all proxies that connect to those
     | proxies, etc.)
     */
    // 'proxies' => '**',

    /*
    | Default Header Names
    |
    | Change these if the proxy does not send the default header names.
     */
    'headers' => \Illuminate\Http\Request::HEADER_X_FORWARDED_FOR |
                 \Illuminate\Http\Request::HEADER_X_FORWARDED_HOST |
                 \Illuminate\Http\Request::HEADER_X_FORWARDED_PORT |
                 \Illuminate\Http\Request::HEADER_X_FORWARDED_PROTO |
                 \Illuminate\Http\Request::HEADER_X_FORWARDED_AWS_ELB,
];