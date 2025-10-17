<?php
include '../../../views/login/index.php';

$nome = $_POST["nome"];
$password = $_POST["pass"];

if(!empty($nome) || !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL($email))){

    }
}

?>