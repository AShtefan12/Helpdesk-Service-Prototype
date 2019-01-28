<?php

function active_route($routePattern, $class = 'active')
{
    $currentRoute = optional(app('router')->current())->getName();

    if (!is_array($routePattern)) {
        $routePattern = explode(' ', $routePattern);
    }

    // Check the current route name
    foreach ((array)$routePattern as $i) {
        if (str_is($i, $currentRoute)) {
            return $class;
        }
    }

    return '';
}