<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=diversogeek', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
            die("ERROR: Não foi possível se conectar ao banco de dados. " . $e->getMessage());
    }
?>