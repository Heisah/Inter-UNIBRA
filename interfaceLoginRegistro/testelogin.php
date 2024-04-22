<?php
session_start();
include_once('AulaEad/script.php');

if (isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {
    // Obter os valores do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Usar uma consulta segura para prevenir SQL Injection
    $sql = "SELECT * FROM aluno WHERE usuario = ? AND senha = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        // Se não houver resultados para o aluno, redirecionar para a página de login
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header("Location: interfaceLogin.php?msg=ERROR");
    } else {
        // Se houver resultados, configurar a sessão com dados do usuário
        $user_data = $result->fetch_assoc();
        $_SESSION['usuario'] = $user_data['usuario'];
        $_SESSION['senha'] = $user_data['senha'];
        $_SESSION['nome'] = $user_data['nome'];
        $_SESSION['id'] = $user_data['id'];

        // Verifica se o usuário é admin para redirecionar
        if ($_SESSION['usuario'] === 'admin@@@') {
            header("Location: adminMonitor/index.php");
        } else {
            header("Location: AulaEad/perfil.php");
        }
    }
} else {
    // Se o formulário não foi submetido corretamente, redirecionar para a página de login
    header("Location: interfaceLogin.php?msg=ERROR");
}
?>
