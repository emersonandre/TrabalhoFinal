<?php
session_set_cookie_params(3600);
session_start();
if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
{
    header('location:../login/logar.html');
}
// include do arquivo de conexao do banco de dados
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
if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($fone) && !empty($cidade) && !empty($bairro)){ //verifica se todos os dados obrigatorios foram preenchidos
    $sql = "INSERT INTO cli_cliente (Cli_nome, Cli_sobrenome, Cli_email, Cli_endereco, Cli_complemento, Cli_telefone, Cid_cidade_Cid_id, Br_Bairro_Br_id) 
            VALUES ('$nome' ,'$sobrenome' ,'$email' ,'$email' ,'$endereco' ,'$complemento' ,'$fone' ,'$cidade' ,'$bairro')";
    //$consulta_query = "";
    //executa a query de consulta para linha e horario;
    $result_query = mysqli_query($conn,$sql);
    if(mysqli_num_rows ($result_query) > 0 ) {  // retorno da consulta de horario e linha;
        echo "New record created successfully";
    }else{ // inicia query para gravar no banco
        header("HTTP/1.0 401");
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
}else{
    header("HTTP/1.0 400 Por Favor Preencha todos os Dados Corretamente!");
    //echo "<script> alert('Por Favor Preencha todos os Dados Corretamente!'); </script>";
}
//}//fim do else !$conn

mysqli_close($conn);//encera conexao com o banco
?>

