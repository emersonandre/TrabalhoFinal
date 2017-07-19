<?php
session_set_cookie_params(3600);
session_start();
if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
{
    header('location:../admin.php');
}
$id_user = $_SESSION['id'];
$logado = $_SESSION['login'];
$acesso = $_SESSION['acesso'];

// inicia script de gravacao
require '../conexao/bd/conecta.php';

$sig = $_POST['eq-sig'];
$nome = $_POST['eq-nome'];
$marca = $_POST['eq-marca'];


if(!empty($sig) or !empty($nome) or !empty($marca)){ //verifica se todos os dados obrigatorios foram preenchidos
    $sql = "INSERT INTO eq_equipamento( eq_sigla, eq_nome, Mar_marca_Mar_id ) 
            VALUES ('$sig', '$nome', '$marca')";

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

mysqli_close($conn);//encera conexao com o banco