
<?php
/* session é uma forma de manter os dados (email e senha) para usuários individuais sem 
a necessidade de enviar essas informações de volta */
    session_start();
   // print_r($_SESSION);  <= um print para ver se a seção realmente está funcionando
    include_once('script.php'); //chamar o SCRIPT.PHP
   
    /* condição, se o email e a senha não existe então ele ira te enviar para a pagina de
   login novamente */
   if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha'])==true))
    
    {
       unset($_SESSION['usuario']);
       unset($_SESSION['senha']);
        header('location: interfaceLogin.php');

   }
   
   if(!empty($_GET['id'])) {
     
       
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

    $logado = $_SESSION['usuario'];
    $nome1 = $_SESSION['nome'];
    $senha= $_SESSION['senha'];

    
//// chamar a query do meu banco de dados



  $sql= "SELECT * FROM aluno WHERE usuario = '$logado' AND senha = '$senha'";


    
    $result = $connect->query($sql);

    //print_r($result); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <title>Sistema</title>
    <style>
  /* Estilo geral para a classe Perfil */
  .Perfil {
    /* Margem externa para separar a seção do resto da página */
    margin: 30px;
    margin-left: 30px;
    margin-right: 10px;
    /* Preenchimento para adicionar espaço interno */
    padding: 20px;
    /* Fundo para dar contraste */
    background-color: #f5f5f5;
 
  
    /* Borda arredondada para suavizar as bordas */
    border-radius: 10px;
    /* Alinhamento de texto para centralizar */
    text-align: center;
    /* Sombras para adicionar profundidade */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
    /* Fonte para dar estilo ao texto */
    font-family: 'Arial', sans-serif;
    /* Cor do texto */
    color: #333;
  }

  .Perfil h1 {
    /* Cor do texto do cabeçalho */
    color: #333;
    /* Fonte para o cabeçalho */
    font-size: 40px;
    /* Peso da fonte para tornar o texto mais proeminente */
    font-weight: bold;
  }

 

 

.esquerdo {
  /* opcional: você pode definir um tamanho fixo ou percentual */
  flex: 1; 

}


.direito {
  margin-top: -300px;
  margin-left: 900px;
  flex: 1;
  text-align: left; /* Alinha o texto no bloco à direita */
}



</style>

</head>

<body>

<link rel="stylesheet" href="css/perfil1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- MENU LATERAL DO SITE-->
    <nav class="menu-lateral">
        <div class="btn-expandir">
            <i class=""></i>
        </div>
        <ul> 
            <li class="item-menu"> 
                <a href="aula.html">
                    <span class="icon"> <i class="bi bi-mortarboard-fill"></i></span>
                    <span class="txt-link"> Aulas </span>
                </a> 
            </li>
            <li class="item-menu"> 
                <a href="apostilas.html">
                    <span class="icon"><i class="bi bi-book"></i> </span>
                    <span class="txt-link"> Apostilas </span>
                </a> 
            </li>
            <li class="item-menu"> 
                <a href="live.html">
                    <span class="icon"> <i class="bi bi-camera-reels"></i> </span>
                    <span class="txt-link">Lives </span>
                </a> 
            </li>
            <li class="item-menu"> 
                <a href="#">
                    <span class="icon"> <i class="bi bi-gear"></i></span>
                    <span class="txt-link">Configurações </span>
                </a> 
            </li>
            <li class="item-menu ativo"> 
                <a href="perfil.php">
                    <span class="icon"> <i class="bi bi-person-circle"></i></span>
                    <span class="txt-link">Perfil </span>
                </a> 
            </li>
        </ul>
    </nav>


      



 <!-- Seção de Cadastro -->
 <section class="area-cadastro">
        <form action="saveEdit.php" method="post" id="form-login">
  <!--- Perfil do Usuario -->
<div class="Perfil ">

  
  
  <div class="esquerdo">

  <?php
echo "<h1> BEM VINDO! <u>$logado </u> </h1>";
/// CRIAR UMA TABELA MOSTRANDOS TODOS OS USUARIOS DO FORMULARIO
?>
  <br>  <br>  <br> 
  <h2> ID do Aluno:  </h2>
  <h2> Usuario:  </h2>
  <h2> Nome Completo:  </h2>
  <h2> Email:  </h2>
  <h2> CPF:  </h2>
  <h2> Genero:  </h2>
  <h2> Estado:  </h2>
  </div>

    <div class="direito">
    <?php 
        while($user_data = mysqli_fetch_assoc($result))
        {
          /// se no userdata o nome for 'adm' pule a linha
          if($user_data['nome'] == 'adm') continue;
          
           
            echo "<h3>" .$user_data['id']. "</h3>";
           
            echo  "<h3>" .$user_data['usuario']. "</h3>" ;
            
            echo "<h3>".$user_data['nome']."<h3>" ;
            
            echo "<h3>".$user_data['email']."</h3>";
            
            echo "<h3>".$user_data['CPF']."</h3>";
            
          //  echo $user_data['senha'];
           
            echo "<h3>".$user_data['genero']."</h3>";
          
            echo "<h3>".$user_data['estado']."</h3>";
         
         
           ///editar o cadastro do usuario usando o id do user
           /// e também um codigo de bootstrap para colocar um icone de lapis
            echo "
            <a class='btn btn-sn btn-primary' href='edit.php?id=$user_data[id]'> 
           Editar Perfil
            </a>
            
          <a  class='btn btn-sn btn-danger'href='delete.php?id=$user_data[id]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
  <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
</svg>
</a>
            ";
            
        }
    ?>
    
  </tbody>
  </table>
  
</div>
</div>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <!-- script para procurar pessoas--->
 <script>
  var search = document.getElementById('pesquisar');

  search.addEventListener("keydown",function(event){ // vai analisar se a tecla que eu cliquei foi enter, e se for ele vai colocar no id do site
    if (event.key ==="Enter"){
      searchData();
    }
  });
  
  function searchData()
  {
    window.location = 'sistema.php?search='+search.value;
  }
  
  
  </script>
</html>