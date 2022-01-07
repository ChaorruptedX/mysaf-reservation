<?php

    session_start();

    function systemAdministratorSession()
    {
        if (empty($_SESSION) || $_SESSION["role_code"] != "SA001")
        {
            header('Location: ' . constant("BASEURL") . 'public/index.php');
        }
    }

    function committeeSession()
    {
        if (empty($_SESSION) || !in_array($_SESSION["role_code"], ["SA001", "MC001"]))
        {
            header('Location: ' . constant("BASEURL") . 'public/index.php');
        }
    }

    function userSession()
    {
        if (empty($_SESSION) || $_SESSION["role_code"] != "U001")
        {
            header('Location: ' . constant("BASEURL") . 'public/index.php');
        }
    }

    function guestSession()
    {
        if (!empty($_SESSION))
        {
            if ($_SESSION["role_code"] == "U001")
            {
                header('Location: ' . constant("BASEURL") . 'public/user/index.php');
            }
            else if (in_array($_SESSION["role_code"], ["SA001", "MC001"]))
            {
                header('Location: ' . constant("BASEURL") . 'public/committee/index.php');
            }
        }
    }
?>