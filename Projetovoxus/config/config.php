<?php

 $usuario = "root"; $senha = "";
try{
$conn = new PDO('mysql:host=localhost;dbname=gerenciadortarefas',$usuario,$senha,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo 'Error '.$e->getMessage();
}

