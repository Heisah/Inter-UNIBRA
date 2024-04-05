<?php
session_start();
include_once('script.php');
// Se o formulário foi submetido com email e senha preenchidos
if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
 

    // Obter os valores do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
  

    // Consultar o SQL para verificar se o email e a senha existem no banco de dados
    $sql = "SELECT * FROM aluno WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = $connect->query($sql);




    // Se não houver resultados para aluno, redirecionar para a página de login
    if(mysqli_num_rows($result) < 1){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: interfaceLogin.php');
         header("Location: interfaceLogin.php?msg=ERROR");
    } 
    else 
    {
        // Se houver resultados para aluno, redirecionar para a página do sistema
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        $_SESSION['nome'] = $nome;
        echo "funciona";
        header("Location: lobby.php");
        
        //header('Location: sistema.php');
     
    }

}
else 
{
    // Se o formulário não foi submetido corretamente, redirecionar de volta para a página de login
    header("Location: interfaceLogin.php?msg=ERRORBURRO");
}
?>

<?php session_start(); ?>
<?php if($_SESSION['usuario'] == 'admin@@@'){
    header("Location: sistema.php");
}

?>


