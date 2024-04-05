<?php
    session_start();
    // print_r($_SESSION);  <= um print para ver se a sessão realmente está funcionando

    if(!empty($_GET['id'])) {
        include_once('SCRIPT.PHP');
        
        $id = $_GET['id'];
        $sqlselect ="SELECT * FROM aluno WHERE id =$id";
        
        $result = $connect->query($sqlselect);

        if($result->num_rows > 0) {
            while($user_data = mysqli_fetch_assoc($result)) {
                $id = $user_data['id'];
                $usuario = $user_data['usuario'];
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $CPF = $user_data['CPF'];
                $senha = $user_data['senha'];
                $genero = $user_data['genero'];
             
                $estado = $user_data['estado'];
               
            }
                    }
        else {
            header('Location: sistema.php');
        }
    }
?>

<!-- TESTE PARA MANDAR MENSAGEM CASO DEU CERTO E PARA IMPEDIR QUE ENTRE SEM DEIXAR OS DOIS CAMPO -->
<?php 
if(!empty($_GET['msg'])){
    
    if (!empty($_GET['msg'] == "OK")){
        ?>
       
       <div class="alert-info" role="alert"> <!--  deixe verde com o css-->
        <?php echo "<strong> Registrado com Sucesso! </strong>"; ?>

        </div>
        
        <?php 
    }
        else if($_GET['msg'] == "ERROR"){
            ?>
            <div class="alert-info" role="alert"> <!-- deixe vermelho com o css  -->
            <?php echo "<strong> Email ou Senha incorreta! </strong>"; ?>
            </div>
<?php
        }
        else
        {
            ?>
            <div class="alert-info" role = "alert"> <!--  deixe vermelho com o css -->
                <?php echo "<strong> não foi possivel encontrar o seu registro no database </strong>"; ?>
                </div> 
                
                <?php
        }
      unset($_GET['msg']);
    

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link para o Estilo CSS da página -->
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">

    <!-- Link para BootsTrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <!-- Background do Site -->
    <video autoplay muted loop>
        <source src="src/backmodelofinal.mp4" class="bg-img" type="video/mp4">
    </video>

    <!-- Seção de Login -->
    <section class="area-login">
        <!-- Lado Esquerdo do Login -->
        <div class="intro">
            <i class="bi bi-person-lock"></i>
            <h1>ADMINISTRAÇÃO</h1>
            <p>Comece já a estudar o melhor da nutrição!</p>
            <p class="tp-cadastro">Não possui Login? <a href="#" id="cadtela">Cadastre-se</a></p>
        </div>

        <!-- Lado Direito do Login -->
        <div class="form">
            <form action="testelogin.php" method="post" id="form-login">
                <h2>Usuário</h2>
                <input type="text" class="input-class" placeholder="Usuário" id="usuario" name="usuario"  value="<?php echo $usuario ?>" required>
                <h2>Senha</h2>
                <input type="password" class="input-class" placeholder="Senha" id="senha" name="senha" required  value="<?php echo $senha ?>" required>
                <br>
                <input class="btn-login" type="submit" name="submit" value="Entrar">
            </form>
        </div>
    </section>

    <!-- Seção de Cadastro -->
    <section class="area-cadastro">
        <form action="saveEdit.php" method="post" id="form-login">
            <!-- Area de Cadastro -->
            <div class="center-cadastro">
                <h1><a class="log-text" id="logtela"><i class="bi bi-arrow-left-short"></i>Login</a></h1>
                <p>Insira seus dados para registrar-se:</p>

                <label for="usuario">Nome do Usuário</label> 
                <input type="text" class="iptClass" placeholder="Usuário..."  id="usuario" name="usuario"  value="<?php echo $usuario ?>"  required>
                <label for="nome">Nome Completo</label> 
                <input type="text" class="iptClass" placeholder="Nome Completo..." id="nome" name="nome" value="<?php echo $nome ?>" required>

                <label for="email">E-mail</label>
                <input type="email" class="iptClass" placeholder="Email..." id="email" name="email" value="<?php echo $email ?>"  required>

                <label for="CPF">CPF</label>
                <input type="text" class="iptClass" placeholder="CPF..." id="CPF" name="CPF" maxlength="14"  pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?php echo $CPF ?>"  required>
                
                <label for="estado">Estado</label> 
                <input type="text" name="estado" id="estado" class="iptClass"  value="<?php echo $estado ?>" required>
                
                <p>Sexo:</p>
                <input type="radio" name="genero" id="feminino" value="feminino" class="InputUser" <?php echo($genero == 'feminino') ? 'checked' : '' ?>  required>
                <label for="feminino">Feminino</label>
                <input type="radio" name="genero" id="masculino" value="masculino" class="InputUser" <?php echo($genero == 'masculino') ? 'checked' : '' ?>  required>
                <label for="masculino">Masculino</label>
                <input type="radio" name="genero" id="outro" value="outro" class="InputUser" <?php echo($genero == 'outro') ? 'checked' : '' ?>  required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="iptClass" placeholder="Senha..." value="<?php echo $senha ?>"   required>

                <label for="confirmarSenha">Confirmar Senha</label>
                <input type="password" id="confirmarSenha" name="confirmarSenha" class="iptClass" value="<?php echo $senha ?>"  required>
                <span id="senhaError" class="error"></span>
             
                <input type="hidden" name="id" value="<?php echo $id ?>"  class="btn-login">
                <input type="submit" name="update" id="update">
           
            </div>
            <!-- Lado Direito do Cadastro -->
            <div class="logicText">
                <p>Após confirmar seus dados<br> Aguarde para que sua conta<br> seja aceita no nosso sistema.</p>
            </div>
        </form>
    </section>

    <!-- Conexão com o Script -->
    <script src="logreg.js"></script>
    <!-- script para ver se as senhas não estão iguais e também verificação para deixar o email como = '@' e ponto final qualquercoisa@gmail.com -->
    <script>
        const form = document.getElementById('signupForm');
        const senhaInput = document.getElementById('senha');
        const confirmarSenhaInput = document.getElementById('confirmarSenha');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const senhaError = document.getElementById('senhaError');

        form.addEventListener('submit', function(event) {
            if (!validarSenha()) {
                event.preventDefault();
                senhaError.textContent = 'As senhas não coincidem.';
            } else {
                senhaError.textContent = '';
            }

            if (!validarEmail()) {
                event.preventDefault();
                emailError.textContent = 'Por favor, insira um email válido.';
            } else {
                emailError.textContent = '';
            }
        });

        function validarSenha() {
            return senhaInput.value === confirmarSenhaInput.value;
        }

        function validarEmail() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(emailInput.value);
        }

        senhaInput.addEventListener('input', function() {
            if (!validarSenha()) {
                senhaError.textContent = 'As senhas não coincidem.';
            } else {
                senhaError.textContent = '';
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
                emailError.textContent = 'Por favor, insira um email válido.';
            } else {
                emailError.textContent = '';
            }
        });
    </script>
</body>
</html>
