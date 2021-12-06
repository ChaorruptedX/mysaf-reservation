<?php

    session_start();

    // Set Session Variables
    $_SESSION["id_user"] = "1";
    $_SESSION["role_code"] = "";
    $_SESSION["user_email"] = "admin@gmail.com";

    function systemAdministratorSession()
    {
        if (!isset($_SESSION["role_code"]) || $_SESSION["role_code"] != "SA001")
        {
            header('Location: ../index.php');
        }
    }

    function committeeSession()
    {
        if (!isset($_SESSION["role_code"]) || !in_array($_SESSION["role_code"], ["SA001", "MC001"]))
        {
            header('Location: ../index.php');
        }
    }

    function userSession()
    {
        if (!isset($_SESSION["role_code"]) || $_SESSION["role_code"] != "U001")
        {
            header('Location: ../index.php');
        }
    }

    function guestSession()
    {
        if (isset($_SESSION["role_code"]))
        {
            if ($_SESSION["role_code"] == "U001")
            {
                header('Location: user/index.php');
            }
            else if (in_array($_SESSION["role_code"], ["SA001", "MC001"]))
            {
                header('Location: committee/index.php');
            }
        }
    }

    // Remove All Session Variables
    // session_unset();
    
    // Destroy the Session
    // session_destroy();

?>