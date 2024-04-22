<?php
include_once('script.php'); /// chamar o SCRIPT.php para usar o banco de dados 

if(isset($_POST['update']))
{ // verificar se existe um update enviado
$id = $_POST['id'];
$usuario = $_POST['usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$CPF = $_POST['CPF'];
$senha = $_POST['senha'];
 $genero = $_POST['genero'];

$estado = $_POST['estado'];

/// criar um update no seu banco de dados
$sqlUpdate = "UPDATE aluno 
SET  usuario='$usuario', nome='$nome', email='$email', CPF='$CPF', senha='$senha', genero='$genero',estado='$estado'
WHERE id ='$id'";

$result = $connect->query($sqlUpdate);
if ($result === TRUE) { // um if para verificar se o registro funcionou ou não
    echo "Registro atualizado com sucesso!";
    header('Location: perfil.php');

} else {
    echo "Erro ao atualizar registro: " . $connect->error;
}
}

?>