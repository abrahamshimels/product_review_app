<?php

if (!function_exists('getYouTubeId')) {
    function getYouTubeId($url)
    {
        if (!$url) return null;

        $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/';
        preg_match($regExp, $url, $match);

        return ($match && strlen($match[2]) === 11) ? $match[2] : null;
    }
}
