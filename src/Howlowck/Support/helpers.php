<?php

if ( ! function_exists('slugify'))
{
    /**
     * Generate a URL to a controller action.
     *
     * @param  string  $name
     * @param  string  $parameters
     * @param  bool    $absolute
     * @return string
     */
    function slugify($input) {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
          $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('-', $ret);
    }
}