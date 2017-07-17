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



