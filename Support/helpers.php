<?php
/**
 * Basic Process Time
 *
 * Oğuzhan ÇAKAR <ogzcakar@gmail.com>
 */

if (! function_exists('processTime')) {
    function processTime($key, $file = null)
    {
        return (new \BasicProcessTime\BasicProcessTime($key, $file))->time();
    }
}