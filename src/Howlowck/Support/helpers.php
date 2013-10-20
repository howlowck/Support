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
if ( ! function_exists('is_only_false')) {
    /**
     *  Test if value is only false or zero
     *  @param mixed $value
     *  @param   bool $zeroOnly Only consider 0 and not False
     *  @return  bool
     */
    function is_only_false($value, $zeroOnly = false) {
        if ($zeroOnly) {
            return !is_null($value) and !is_bool($value) and $value == 0;
        }
        return !is_null($value) and ($value == 0 or $value == false);
    }
}
if ( ! function_exists('array_contains')) {
    /**
     * Test if an array or string is in another array
     * @param  array haystack
     * @param  mixed needle
     *
     * @return  bool
     */
    function array_contains($haystack, $needle) {
        $needle = (array) $needle;
        $output = true;
        foreach ($needle as $value) {
            $output = ($output and in_array($value, $haystack));
        }
        return $output;
    }
}

if ( ! function_exists('array_exclude'))
{
    /**
     * Exclude an array
     *
     * @param  array  $orig
     * @param  array  $exclude
     * @return string
     */
    function array_exclude(array $orig, $exclude) {
        $output = [];
        $exclude = (array) $exclude;
        foreach ($orig as $item) {
            if (in_array($item, $exclude)) {
                continue;
            }
            $output[] = $item;
        }
        return $output;
    }
}

if ( ! function_exists('array_to_li')) {
    /**
     * Convert a PHP array to html li elements
     * @param array Input Array
     * @return  string
     */
    function array_to_li(array $array) {
        $output = '';
        foreach ($array as $value) {
            $output .= '<li>' . $value . '</li>';
        }
        return $output;
    }
}

if ( ! function_exists('bool_to_word')) {
    /**
     * Convert Boolean Value to Human readable string
     * @param mixed $input
     * @param string Yes/No String
     * @return  string
     */
    function bool_to_word($value, $config = 'Yes:No:N/A') {
        $yesNo = explode(':', $config);
        $yesString = $yesNo[0];
        $noString = $yesNo[1];
        $nullString = $yesNo[2];
        if (is_null($value)) {
            return $nullString;
        }
        if ((bool) $value) {
            return $yesString;
        } else {
            return $noString;
        }

    }
}

if ( ! function_exists('dad')) {
    /**
     * Dump All Die
     */
    function dad() {
        array_map(function($value) { d($value); }, func_get_args()); die;
    }
}