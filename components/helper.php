<?php

    /**
     * Highlight Active URL
     */
    function active_url($file_names)
    {
        $basename_url = basename($_SERVER['REQUEST_URI']); // Get File Name
        $parse_url = parse_url($basename_url, PHP_URL_PATH); // Remove Parameters

        if (is_array($file_names))
        {
            foreach ($file_names as $file_name)
            {
                if ($file_name == $parse_url)
                {
                    return "active";
                }
            }
        }
        else
        {
            if ($file_names == $parse_url)
            {
                    return "active";
            }
        }

        return null;
    }

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

    /**
     * Get Active Mosque Data
     */
    function getActiveMosque($conn)
    {
        try
        {
            $stmt = $conn->prepare("
                SELECT
                    *
                FROM mosque
                WHERE
                    deleted_at='0'
            ");

            $stmt->execute();

            // Set the Resulting Array to Associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            dd("Error: " . $e->getMessage());
        }

        return $stmt->fetch();
    }

    /**
     * Get Reservation Data Closest to Current Date
     */
    function getClosestReservation($conn)
    {
        try
        {
            $stmt = $conn->prepare("
                SELECT
                    *
                FROM reservation
                WHERE
                    close_time >= '" . getCurrentDateTime() . "'
                    AND deleted_at = '0'
            ");

            $stmt->execute();

            // Set the Resulting Array to Associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            dd("Error: " . $e->getMessage());
        }

        return $stmt->fetch();
    }

    /**
     * Get Current Date Time
     */
    function getCurrentDateTime()
    {
        return date('Y-m-d H:i:s');
    }

    /**
     * Get Date Format
     */
    function getDateFormat($dateTime)
    {
        return date("j F Y", strtotime($dateTime));
    }

    /**
     * Get Full Date Time with Format
     */
    function getFullDateTimeFormat($dateTime)
    {
        return date("l, j F Y, g:i A", strtotime($dateTime));
    }

    /**
     * Get Personal Detail Data by ID User
     */
    function getPersonalDetailbyIdUser($conn, $id_user)
    {
        try
        {
            $stmt = $conn->prepare("
                SELECT
                    *
                FROM personal_detail
                WHERE
                    id_user='" . $id_user . "'
                    AND deleted_at='0'
            ");

            $stmt->execute();

            // Set the Resulting Array to Associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            dd("Error: " . $e->getMessage());
        }

        return $stmt->fetch();
    }

    /**
     * Get Lookup Role Data
     */
    function lookupRole($conn, $code = null)
    {
        try
        {
            if ($code === null)
            {
                $stmt = $conn->prepare("
                    SELECT
                        *
                    FROM lookup_role
                    WHERE
                        deleted_at='0'
                ");
            }
            else
            {
                $stmt = $conn->prepare("
                    SELECT
                        *
                    FROM lookup_role
                    WHERE
                        code='" . $code . "'
                        AND deleted_at='0'
                ");
            }

            $stmt->execute();

            // Set the Resulting Array to Associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            dd("Error: " . $e->getMessage());
        }

        if ($code === null)
            return $stmt->fetchAll();
        else
            return $stmt->fetch();
    }

?>