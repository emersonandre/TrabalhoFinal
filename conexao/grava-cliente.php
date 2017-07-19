<?php
session_set_cookie_params(3600);
session_start();
if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
{
    header('location:../login/logar.html');
}
$id_user = $_SESSION['id'];
$logado = $_SESSION['login'];
$acesso = $_SESSION['acesso'];

// inicia script de gravacao
require '../conexao/bd/conecta.php';


//executa variaveis vindas do post
$nome = $_POST['user-nome'];
$sobrenome = $_POST['user-sob'];
$email = $_POST['user-email'];
$endereco = $_POST['user-ender'];
$complemento = $_POST['user-compl'];
$fone = $_POST['user-fone'];
$cidade = $_POST['cid-cidade'];
$bairro = $_POST['id-bairro'];

//inicia validação e inserção dos dados
if(!empty($nome) or !empty($sobrenome) or !empty($email) or !empty($fone) or !empty($cidade) or !empty($bairro)){ //verifica se todos os dados obrigatorios foram preenchidos
    $sql = "INSERT INTO cli_cliente( cli_nome, cli_sobrenome, cli_email, cli_endereco, cli_complemento, cli_telefone, cid_cidade_cid_id, br_bairro_br_id) 
            VALUES ('$nome' ,'$sobrenome' ,'$email' ,'$endereco' ,'$complemento' ,'$fone' ,'$cidade' ,'$bairro')";

    //$consulta_query = "";
    //executa a query de consulta para linha e horario;

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header('HTTP/1.0 200');
    }else{
        header('HTTP/1.0 500" . $sql . "<br>" . mysqli_error($conn)');
        echo'<script> alert(" Error: " . $sql . "<br>" . mysqli_error($conn);") </script>';

    }
}else{
    header("HTTP/1.0 400 Por Favor Preencha todos os Dados Corretamente!");
    echo "<script> alert('Por Favor Preencha todos os Dados Corretamente!;') </script>";
}
//}//fim do else !$conn

//mysqli_close($conn);//encera conexao com o banco


