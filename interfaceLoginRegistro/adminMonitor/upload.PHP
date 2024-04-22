
<?php
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepara os dados recebidos do formulário
        $titulo = $_POST['titulo'];
        $link = $_POST['link'];
        $postador = $_POST['postador'];
        $data = $_POST['data_publicao'];
    
        // Prepara a consulta SQL para inserção de dados
        $sql = "INSERT INTO aulas (titulo, link, postador, data_publicacao) VALUES ('$titulo', '$link','$postador','$data')";
    
        // Executa a consulta SQL
        if ($connect->query($sql) === TRUE) {
            echo "Aula inserida com sucesso.";
            header('location:360Uploads.html');
        } else {
            echo "Erro ao inserir aula" .$connect->error;
        }
        // Fecha a conexão com o banco de dados
        $connect->close();
    }
}


