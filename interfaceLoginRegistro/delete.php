<?php
if (!empty($_GET['id'])) {
    include_once('script.php');

    $id = $_GET['id'];

    $sqlselect = "SELECT * FROM aluno WHERE id = $id";

    $result = $connect->query($sqlselect);

    if ($result->num_rows > 0) {
        // Como você só está interessado em uma única linha, você pode remover o loop while
        $user_data = mysqli_fetch_assoc($result);

        $id = $user_data['id'];
        $nome = $user_data['nome'];
        $email = $user_data['email'];
        $CPF = $user_data['CPF'];
        $senha = $user_data['senha'];
        $genero = $user_data['genero'];
       
        $estado = $user_data['estado'];
        

        $sqlDelete = "DELETE FROM aluno WHERE id = $id";
        $resultDelete = $connect->query($sqlDelete);

        // Verifica se a exclusão foi bem-sucedida antes de redirecionar
        if ($resultDelete) {
            header('Location: sistema.php');
        } else {
            echo "Erro ao excluir o registro: " . $connect->error;
        }
    } else {
        echo "Nenhum registro encontrado para excluir.";
    }
}
?>
