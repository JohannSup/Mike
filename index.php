<?php
    header('Content-Type: application/JSON');
    $metodo = $_SERVER['REQUEST_METHOD'];
    switch($metodo){
        case 'GET': //Consulta
            try{
                $client = new PDO("mysql:host=localhost;dbname=staff", "root", "root");
                $result = $client->query("SELECT * FROM personal;");
                $personal = array();
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $personal[] = $row;

                }
                echo json_encode($personal);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            break;
        case 'POST': //iNSERCION
            break;
        case 'PUT': //ACTUALIZACION
            break;
        case 'DELETE': //ELIMINACION
            break;
        default:
            echo 'Metodo no soportado';
    }