<?php

    /**
     * bcrypt Algorithm for Password Hashing
     */
    function bcrypt_hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Debug function
     * d($var);
     */
    function d($var, $caller = null)
    {
        if (!isset($caller))
        {
            $caller = array_shift(debug_backtrace(1));
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
        $caller = array_shift(debug_backtrace(1));
        d($var, $caller);
        die();
    }

?>