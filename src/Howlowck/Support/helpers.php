<?php

if ( ! function_exists('slugify'))
{
    /**
     * Slugify a string
     *
     * @param  string    $input
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

if ( ! function_exists('is_empty')) {
    /**
     * Test if Empty
     *
     * @param  mixed $input
     * @return  bool 
     */
    function is_empty($input) {
        $value = $input;
        if (is_string($value)) {
            $value = trim($value);
        }
        return empty($value) && ! is_numeric($value);
    }
}