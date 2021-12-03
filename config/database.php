<?php

    $servername = "localhost";
    $databasename = "mysaf_reservation";
    $username = "root";
    $password = "";

    try
    {
        $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $databasename, $username, $password); // Create Connection
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set the PDO Error Mode to Exception

        // dd("Connected successfully");
    }
    catch (PDOException $e)
    {
        dd("Connection failed: " . $e->getMessage());
    }

?>