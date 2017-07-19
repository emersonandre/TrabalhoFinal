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

require '../conexao/bd/conecta.php';

$id_cliente = $_POST['id'];

$sql = "DELETE FROM cli_cliente WHERE cli_id='$id_cliente'";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>