<?php

if (!function_exists('fastcgi_finish_request')) {
    ### http://stackoverflow.com/questions/23719821/response-returned-only-after-kernel-terminate-event
    $response->headers->set('Content-Length', strlen($response->getContent()));
    $response->headers->set('Connection', 'close');
}
