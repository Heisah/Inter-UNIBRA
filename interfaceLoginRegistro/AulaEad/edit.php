<?php
session_start(); // Iniciar a sessão para manter dados entre páginas
// print_r($_SESSION);  <= um print para ver se a sessão realmente está funcionando

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver autenticado
    exit();
}

if (!empty($_GET['id'])) {
    include_once('SCRIPT.PHP');

    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT); // Certifica-se de que o ID é um número inteiro

    if ($id !== false) {
        // Usar prepared statements para evitar SQL Injection
        $stmt = $connect->prepare("SELECT * FROM aluno WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Recuperar os dados do aluno
            while ($user_data = $result->fetch_assoc()) {
                $id = $user_data['id'];
                $usuario = $user_data['usuario'];
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $CPF = $user_data['CPF'];
                $senha = $user_data['senha'];
                $genero = $user_data['genero'];
                $estado = $user_data['estado'];
            }
        } else {
            header('Location: perfil.php'); // Se não houver resultados, redireciona para a página do perfil
        }
    } else {
        header('Location: perfil.php'); // Se o ID não for válido, redireciona para a página do perfil
    }
}
?>

<!-- Exibe mensagens de sucesso ou erro -->
<?php 
if (!empty($_GET['msg'])) {
    if ($_GET['msg'] === "OK") {
        ?>
        <div class="alert-info" role="alert"> <!-- Exibe uma mensagem verde para sucesso -->
        <?php echo "<strong> Registrado com Sucesso! </strong>"; ?>
        </div>
        <?php 
    } else if ($_GET['msg'] === "ERROR") {
        ?>
        <div class="alert-danger" role="alert"> <!-- Exibe uma mensagem vermelha para erro -->
        <?php echo "<strong> Email ou Senha incorreta! </strong>"; ?>
        </div>
        <?php
    } else {
        ?>
        <div class="alert-danger" role="alert"> <!-- Mensagem vermelha para erro genérico -->
        <?php echo "<strong> Não foi possível encontrar o seu registro no banco de dados </strong>"; ?>
        </div>
        <?php
    }
    // Em vez de usar unset, redirecione para evitar mensagens repetidas
    header('Location: perfil.php'); 
    exit(); // Use exit para interromper a execução após redirecionar
}
?>

<!DOCTYPE html>
<html lang="pt-br"> <!-- Mudar para "pt-br" para a língua portuguesa -->
<head>
    <!-- Link para o Estilo CSS da página -->
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">

    <!-- Link para Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <meta charset="UTF-8"> <!-- Conjunto de caracteres padrão UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Para responsividade -->
    <title>Editar Perfil</title> <!-- Mudei para refletir a página de edição de perfil -->
</head>
<body>
    <!-- Seção de Cadastro para edição do perfil -->
    <section class="area-cadastro">
        <form action="saveEdit.php" method="post" id="form-login"> <!-- Mudar o nome do formulário para representar a ação -->
            <div class="center-cadastro">
                <a href="perfil.php"> <i>Sair</i> </a> 
                <h1><a class="log-text" id="logtela"><i class="editar"></i>EDITAR PERFIL</a></h1>

                <label for="usuario">Nome do Usuário</label> 
                <input type="text" class="iptClass" placeholder="Usuário..."  id="usuario" name="usuario"  value="<?php echo htmlspecialchars($usuario); ?>"  required> <!-- Uso do htmlspecialchars para evitar XSS -->
                <label for="nome">Nome Completo</label> 
                <input type="text" class="iptClass" placeholder="Nome Completo..." id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required> 

                <label para="email">E-mail</label>
                <input type="email" class="iptClass" placeholder="Email..." id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"  required> 

                <label para="CPF">CPF</label>
                <input type="text" class="iptClass" placeholder="CPF..." id="CPF" name="CPF" maxlength="14" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?php echo htmlspecialchars($CPF); ?>" required> 
                
                <label para="estado">Estado</label> 
                <input type="text" name="estado" id="estado" class="iptClass" value="<?php echo htmlspecialchars($estado); ?>" required> 
                
                <p>Sexo:</p>
                <input type="radio" name="genero" id="feminino" value="feminino" class="InputUser" <?php echo($genero == 'feminino') ? 'checked' : ''; ?> required> 
                <label para="feminino">Feminino</label>
                <input type="radio" name="genero" id="masculino" value="masculino" class="InputUser" <?php echo($genero == 'masculino') ? 'checked' : ''; ?> required> 
                <label para="masculino">Masculino</label>
                <input type="radio" name="genero" id="outro" value="outro" class="InputUser" <?php echo($genero == 'outro') ? 'checked' : ''; ?> required> 
                <label para="outro">Outro</label>
                
                <br><br>
                <label para="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="iptClass" placeholder="Senha..." value="<?php echo htmlspecialchars($senha); ?>" required> 

                <label para="confirmarSenha">Confirmar Senha</label>
                <input type="password" id="confirmarSenha" name="confirmarSenha" class="iptClass" value="<?php echo htmlspecialchars($senha); ?>" required> 

                <span id="senhaError" class="error"></span>
                
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"  class="btn-login"> 
                <input type="submit" name="update" id="update" class="btn-login"> <!-- Adicionar a classe CSS para manter a consistência -->
            </div>
        </form>
    </section>

    <!-- Conexão com o Script JavaScript para validações -->
    <script src="logreg.js"></script>

    <!-- Script para validação de senha e e-mail -->
    <script>
        const form = document.getElementById('form-login'); // Ajustado para refletir o ID correto
        const senhaInput = document.getElementById('senha');
        const confirmarSenhaInput = document.getElementById('confirmarSenha');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const senhaError = document.getElementById('senhaError');

        form.addEventListener('submit', function(event) {
            if (!validarSenha()) {
                event.preventDefault();
                senhaError.textContent = 'As senhas não coincidem.';
            }

            if (!validarEmail()) {
                event.preventDefault();
                emailError.textContent = 'Por favor, insira um e-mail válido.';
            }
        });

        function validarSenha() {
            return senhaInput.value === confirmarSenhaInput.value; // Verificar se as senhas são iguais
        }

        function validarEmail() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
            return emailRegex.test(emailInput.value);
        }

        senhaInput.addEventListener('input', function() {
            if (!validarSenha()) {
                senhaError.textContent = 'As senhas não coincidem.';
            } else {
                senhaError.textContent = ''; // Limpa o erro se as senhas coincidirem
            }
        });

        confirmarSenhaInput.addEventListener('input', function() {
            if (!validarSenha()) {
                senhaError.textContent = 'As senhas não coincidem.';
            } else {
                senhaError.textContent = '';
            }
        });

        emailInput.addEventListener('input', function() {
            if (!validarEmail()) {
                emailError.textContent = 'Por favor, insira um e-mail válido.';
            } else {
                emailError.textContent = ''; // Limpa o erro se o e-mail for válido
            }
        });
    </script>
</body>
</html>
