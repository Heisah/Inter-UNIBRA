
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

    $logado = $_SESSION['usuario'];
//// chamar a query do meu banco de dados
if(!empty($_GET['search']))
{
  /// procurar se no url tem a palavra search e se estiver ele vai pesquisar se existe um aluno com o nome, email, sexo, senha que voce pesquisou
  $data = $_GET['search'];

  $sql= "SELECT * FROM  aluno WHERE id LIKE '%$data%' OR nome LIKE '%$data%'  OR  email  LIKE '%$data%'  OR senha  LIKE '%$data%'
 OR   genero  LIKE '%$data%' OR  estado  LIKE '%$data%'  ORDER BY id DESC ";
    echo "pegou";
}
else{
  $sql= "SELECT * FROM aluno ORDER BY id DESC ";
}


    
    $result = $connect->query($sql);

    ///print_r($result); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sistema</title>
</head>
<style>
body{
    font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
      text-align: center;
        color: white;
}
.table-bg{
  background: rgba(0,0,0,0.5);
  border-radius: 15px 15px 0 0;



  }
  .box-search{
    display: flex;
    justify-content: center;
    gap: 1p;
  }

</style>
<body>

<!--- tudo isso é do bootstrap, voces podem mudar se quiser eu só fiz do jeito rapido mesmo -->
    <nav class="navbar navbar-expand-1g navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> SISTEMA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navBarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
  </button>      
</div>
<div class="d-flex">
 <!-- botão para sair -->
    <a href="sair.php" class="btn btn-danger me-5"> Sair</a>
</div>
</nav>
<br>

<?php
echo "<h1> BEM VINDO! <u>$logado </u> </h1>";
/// CRIAR UMA TABELA MOSTRANDOS TODOS OS USUARIOS DO FORMULARIO
?>
<div class="box-search">
  <input type="search" class="form-control w-25" placeholder="Pesquisar" id= "pesquisar" >

  <button onclick="searchData()" class="btn btn-primary">
<!--- icone de pesquisa-->
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
   <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg>

  </button>

</div>

<!--- a tabela construida -->
<div class="m-5 ">
<table class="table text-white table-bg">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario </th>
      <th scope="col">Nome </th>
      <th scope="col">Email </th>
      <th scope="col">CPF </th>
      <th scope="col">senha </th>
      <th scope="col">Genero </th>
     <th scope="col">Estado </th>
     <th scope="col">...</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        while($user_data = mysqli_fetch_assoc($result))
        {
          /// se no userdata o nome for 'adm' pule a linha
          if($user_data['nome'] == 'adm') continue;
            echo "<tr>";
            echo "<td>".$user_data['id']."</td>";
            echo "<td>".$user_data['usuario']."</td>";
            echo "<td>".$user_data['nome']."</td>";
            echo "<td>".$user_data['email']."</td>";
            echo "<td>".$user_data['CPF']."</td>";
            echo "<td>".$user_data['senha']."</td>";
            echo "<td>".$user_data['genero']."</td>";

           
            echo "<td>".$user_data['estado']."</td>";
      
           ///editar o cadastro do usuario usando o id do user
           /// e também um codigo de bootstrap para colocar um icone de lapis
            echo "<td> 
            <a class='btn btn-sn btn-primary' href='edit.php?id=$user_data[id]'> 
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
          <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
          </svg>
            </a>
          <a  class='btn btn-sn btn-danger'href='delete.php?id=$user_data[id]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
  <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
</svg>
</a>
            </td>";
            echo "</tr>";
        }
    ?>
  </tbody>
  </table>
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