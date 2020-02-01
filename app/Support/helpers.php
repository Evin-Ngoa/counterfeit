<?php

if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (!function_exists('trigger_active')) {

    /**
     * Return 'active' as a class for an element based on URL
     * @param $url
     * @param bool $contains
     * @return null|string
     */
    function trigger_active($url = null, $contains = false)
    {
//        dd([request()->url(), url()->current(), request()->url() === url()->current()]);
        if ($contains) {
            $status = Str::contains(request()->url(), $url);
            return $status ? "active" : null;
        }
        return request()->url() === $url ? "active" : null;
    }
}