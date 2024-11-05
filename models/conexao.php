<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fittech";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Define o modo de erro do PDO para exceções
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Falha na conexão: " . $e->getMessage());
    }

?>