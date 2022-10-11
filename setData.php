<?php

    ini_set('display_errors',1);
    $nombre = $_REQUEST["nombre"];
    $apellido = $_REQUEST["apellido"];
    $fdn = $_REQUEST["fdn"];
    $salario = $_REQUEST["salario"];
    $posicion = $_REQUEST["posicion"];
    $genero = $_REQUEST["genero"];

//GET
//-> CONSULTAR A TODO EL PERSONAL
//POST
// -> REGISTRAR UN PERSONAL
//PUT
// -> ACTUALIZAR UN PERSONAL
//DELETE
// -> ELIMINAR
// 
    if($nombre != "" && $apellido != "" && $fdn != ""  && $salario != "" 
        && $posicion != "" && $genero != ""){
            try{

                $pdo = new PDO("mysql:host=localhost;dbname=staff", "root", "root");
                $resultado =$pdo->prepare('INSERT INTO staff(fname,Iname,
                                             position,sex,dob,salary)
                                             VALUES(:a,:b,:c,d:,e:,f)');
                                             
                $resultado->bindParam(":a", $nombre, PDO::PARAM_STR);
                $resultado->bindParam(":b", $apellido, PDO::PARAM_STR);
                $resultado->bindParam(":c", $fdn, PDO::PARAM_STR);
                $resultado->bindParam(":d", $salario, PDO::PARAM_STR);
                $resultado->bindParam(":e", $posicion, PDO::PARAM_STR);
                $resultado->bindParam(":f", $genero, PDO::PARAM_STR);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        
        }else{
            echo "-1";
        }