

<?php
 
include_once('script.php');
    
// Recuperar o link do banco de dados ou do formulário
 // ou $link = recuperar_link_do_banco();


// Inicializar o ID do vídeo

if ($connect->connect_error) {
    die("Conexão falhou: " . $connect->connect_error);
}

$sqlselect = "SELECT * FROM aulas";
$result = mysqli_query($connect, $sqlselect);

if ($result === false) {
    echo "<code> Erro na consulta SQL: " . $connect->error;

}
else{
    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row['id'];
        $titulo = $row['titulo'];
        $link = $row['link'];
        $descricao = $row['descricao'];
        $postador = $row['postador'];
        $sql = "SELECT * FROM professor WHERE nome = '$postador' ";
        $query = mysqli_query($connect, $sql);
        $linha = mysqli_fetch_assoc($query);
    
}
}
?>

<?php 
// Consulta para Aulas Recentes (ordenar por um campo como data de criação)
$sqlRecentes = "SELECT * FROM aulas ORDER BY data_publicacao DESC LIMIT 5"; // Limita a 5 aulas
$resultRecentes = mysqli_query($connect, $sqlRecentes);

if ($resultRecentes === false) {
    die("Erro na consulta SQL para Aulas Recentes: " . $connect->error);
}

// Consulta para Playlist (ordenar por ID)
$sqlPlaylist = "SELECT * FROM aulas ORDER BY data_publicacao"; // Sem limite, exibe todas
$resultPlaylist = mysqli_query($connect, $sqlPlaylist);

if ($resultPlaylist === false) {
    die("Erro na consulta SQL para Playlist: " . $connect->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Nutri</title>
    <link rel="stylesheet" href="css/aula1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- MENU LATERAL DO SITE-->
    <nav class="menu-lateral">
        <div class="btn-expandir">
            <i class=""></i>
        </div>
        <ul> 
            <li class="item-menu ativo"> 
                <a href="aula.php">
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
            <li class="item-menu "> 
                <a href="live.html">
                    <span class="icon"> <i class="bi bi-camera-reels"></i> </span>
                    <span class="txt-link">Lives </span>
                </a> 
            </li>
            <li class="item-menu"> 
                <a href="configuração.html">
                    <span class="icon"> <i class="bi bi-gear"></i></span>
                    <span class="txt-link">Configurações </span>
                </a> 
            </li>
            <li class="item-menu"> 
                <a href="perfil.php">
                    <span class="icon"> <i class="bi bi-person-circle"></i></span>
                    <span class="txt-link">Perfil </span>
                </a> 
            </li>
        </ul>
    </nav>



   <!-- Texto na esquerda e Imagem na direita-->
   <div class="container">
    <div class="texto">
        <br>
        <h1>Aulas EAD </h1>
        <p>  Amplie seus conhecimentos com acesso a uma ampla variedade
             de vídeos ministrados por professores altamente qualificados.
            </p>
<h3> Siga um curso completo e mergulhe profundamente em sua disciplina preferida 
              para uma experiência de aprendizado abrangente e detalhada.</h3>

    </div>
    <div class="imagem">
        <img src="imagem/aulaNutri.svg" alt="Imagem à Direita">
    </div>
</div>

    <div id="painel">
        <p><a href="" class="titulo">  <?php 
          echo '<h2> Titulo : '  .$titulo. '</h2>';  ?> </a></p>

       <?php echo '<h3>  Por: <i class="bi bi-person-fill"></i> ' .$postador. '</h3>' ?>

        <?php if($link != null ){ ?> <p> <?php    echo '<iframe width="560" height="315" src="' .$link. '" frameborder="0" allowfullscreen></iframe>';
 ?> </p> <?php }  ?> 
        <?php if($descricao != null ) { ?> <?php  echo '<h3>Descrição: '   .$descricao. '</h3>'; } ?> 
        
        <p></p>



        <h2>Aulas Recentes</h2>
    <table border="1">
        <tr>
            
            <th>Título</th>
            <th>Link</th>
          
            
        </tr>
        <?php
        // Loop para exibir aulas recentes
        while ($row = mysqli_fetch_assoc($resultRecentes)) { 
            ?>
            <?php
            echo "<tr>";
            echo "<td>{$row['titulo']}</td>";

            ?>
            
          
             <td> <p> <?php    echo '<iframe width="560" height="315" src="' .$row['link']. '" frameborder="0" allowfullscreen></iframe>';
            ?> </p> 
            
           

            <?php     
          }?>


            </td>
    </table>

    <h2>Playlist</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Link</th>
         
        </tr>
        <?php
        // Loop para exibir playlist
        while ($row = mysqli_fetch_assoc($resultPlaylist)) { 
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['titulo']}</td>";
            ?>

<td> <p> <?php    echo '<iframe width="560" height="315" src="'  .$row['link']. '" frameborder="0" allowfullscreen></iframe>';
            ?> </p> 
            
           

            <?php     
              }?>


            </td>
        
    
    </table>


       
    </div>
    <script src="js/menu.js"></script>
    
</body>

</html>
