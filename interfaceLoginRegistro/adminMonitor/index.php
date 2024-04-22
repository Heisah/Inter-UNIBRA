<?php 

session_start();
include_once('AulaEad/script.php');


if ($_SESSION['usuario'] === 'admin@@@') {
    header('Location: 360Alunos.php');
} else {
    header("Location: ../sair.php");
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
}



?>