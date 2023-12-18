<?php

use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

if (! function_exists('settings')) {
    function settings(string $key, string $default = null): ?string
    {
        return $default;
    }
}
if (! function_exists('activeLink')) {
    function activeLink($name): bool
    {
        return (request()->is($name . '/*') || request()->is($name));
    }

}
if (! function_exists('activePrentLink')) {
    function activePrentLink($parent)
    {

        $hasUrl =  [];


        foreach($parent as $child){


            $url =  url($child['data']['url']);


            if($child['type'] == "external-link"){
                $url = $child['data']['url'];
            }

            $hasUrl[] =  (request()->url() == $url);


        }

       return in_array(true, $hasUrl);
    }

}
