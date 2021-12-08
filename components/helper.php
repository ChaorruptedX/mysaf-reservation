<?php

    /**
     * bcrypt Algorithm for Password Hashing
     */
    function bcrypt_hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Highlight Active URL
     */
    function active_url($file_name)
    {
        $basename_url = basename($_SERVER['REQUEST_URI']); // Get File Name
        $parse_url = parse_url($basename_url, PHP_URL_PATH); // Remove Parameters

        if ($file_name == $parse_url)
        {
            $active = "active";
        }
        else
        {
            $active = null;
        }

        return $active;
    }

    /**
     * Debug function
     * d($var);
     */
    function d($var, $caller = null)
    {
        if (!isset($caller))
        {
            $debug = debug_backtrace(1);
            $caller = array_shift($debug);
        }
        
        echo '<code>File: ' . $caller['file'] . ' / Line: ' . $caller['line'] . '</code>';
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    /**
     * Debug function with die() after
     * dd($var);
     */
    function dd($var)
    {
        $debug = debug_backtrace(1);
        $caller = array_shift($debug);
        d($var, $caller);
        die();
    }

?>