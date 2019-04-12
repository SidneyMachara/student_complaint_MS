<?php

if (! function_exists('isActiveRoute')) {
    function isActiveRoute($route_array, $style ='border-bottom: 10px solid #f8f9fa;')
    {
        if (in_array(Route::currentRouteName(),$route_array))
        return $style;
    }
}
