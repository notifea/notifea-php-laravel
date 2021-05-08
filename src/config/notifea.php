<?php

return [
    // There is no need to modify NOTIFEA_API_HOST in most cases
    'api_host' => env('NOTIFEA_API_HOST', 'https://api.notifea.com/v1'),
    // Get access token from notifea user interface
    'authorization' => env('NOTIFEA_API_AUTHORIZATION'),
    // how long can the package wait until host is resolved
    'connect_timeout' => env('NOTIFEA_CONNECT_TIMEOUT', 10),
    // how long will the client wait for the response after successful connection
    // if any notifea action is done while user waits for the response
    // dont be afraid to set aggressive timeout such as 3 to 5 seconds
    'timeout' => env('NOTIFEA_TIMEOUT', 30),
];
