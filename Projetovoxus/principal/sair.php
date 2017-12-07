<?php

session_start();
//Quebra de sessão;
unset($_SESSION['nome']);
unset($_SESSION['email']);

header('Location: ../index/index.php');
?>
