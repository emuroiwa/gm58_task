<?php

if (!function_exists('classActivePath')) {
    function classActivePath($segment, $value)
    {
        if(!is_array($value)) {
            return Request::segment($segment) == $value ? ' menu-open' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return ' menu-open';
        }
        return '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($segment, $value)
    {
        if(!is_array($value)) {
            return Request::segment($segment) == $value ? 'active' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return 'active';
        }
        return '';
    }
}
if (!function_exists('bageClass')) {
    function bageClass($type,$value)
    {
        if($type=="issue_type") {
            return $value==1 ? 'info' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return 'active';
        }
        return '';
    }
}