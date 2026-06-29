<?php

return [
    // Change view for showing agree terms form
    'view'           => 'agree-terms.form',

    // add paths like logout, login to exculded
    'excluded_paths' => [],

    // Change the store route name if you have custom store
    'store_route'    => 'agree-terms.store',

    // Where to redirect after the user agrees (path or URL).
    // Laravel 11/12 removed App\Providers\RouteServiceProvider::HOME,
    // so the destination is configurable here instead.
    'home'           => '/',
];
