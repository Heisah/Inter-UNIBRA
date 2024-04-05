<?php
// Configurações de conexão com o banco de dados
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'ead_nutri';

/// Criar uma conexão com o banco de dados

$connect = new mysqli($servername,$username,$password,$database);
// verificação caso a conexão seja bem-sucedida
if($connect->connect_error){
    echo "erro na conexão com o banco de dados: " .$connect->connect_error;
}
else
{
    ///echo "Conexão bem-sucedida!";
}


?>