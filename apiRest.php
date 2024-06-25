<?php

/**
 * Web Service RESTful en PHP con MySQL (CRUD)
 * *
 * @author Dashy76
 * @link  https://github.com/Dashy76/web_service_php.git
 */

    require "conexionApi.php";

    $conexion = new Conexion();
    $pdo = $conexion ->obtenerConexion();

    //listar registro y consultar registro
    if ($_SERVER["REQUEST_METHOD"] == "GET"){

        $sql = "SELECT * FROM usuario";
        $params = [];
    
        if (isset($_GET["id"])) {
        $sql .= "WHERE id=:id";
        $params[":id"] = $_GET ["id"];   
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200-ok");
    echo json_encode($stmt->fetchAll());
    exit;

}
