<!DOCTYPE html>
<html lang="en">
<?php
session_set_cookie_params(3600);
session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:./login/logar.html');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
    $acesso = $_SESSION['acesso'];

    if($acesso == '1'){
        echo '<style>#divNivelAcesso { visibility: visible; }</style>';
} else {
    echo '<style>#divNivelAcesso { visibility: hidden; }</style>';
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/padrao-retorno.css" rel="stylesheet">
    <link href="css/label.css" rel="stylesheet">

    <!-- muda alert          -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./admin.php"><img src="img/logo.fw.png" ></a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="./admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#cadastro"><i class="fa fa-fw fa-arrows-v"></i>Cadastro<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="cadastro" class="collapse">
                        <li>
                            <a href="#" id="btnCadCliente"><i class="fa fa-fw fa-edit"></i>Cadastro Cliente</a>
                        </li>
                        <li>
                            <a href="#" id="btnCadMaquinas"><i class="fa fa-fw fa-edit"></i>Cadastro Maquinas</a>
                        </li>
                        <li>
                            <a href="#" id="btnCadOs"><i class="fa fa-fw fa-edit"></i>Cadastro Os</a>
                        </li>
                        <li>
                            <a href="#" id="btnCadItens"><i class="fa fa-fw fa-edit"></i>Cadastro Itens</a>
                        </li>
                        <li>
                            <a href="#" id="btnCadFornecedor"><i class="fa fa-fw fa-edit"></i>Cadastro Fornecedor</a>
                        </li>
                        <li>
                            <a href="#" id="btnCadMarcas"><i class="fa fa-fw fa-edit"></i>Cadastro Marcas</a>
                        </li>
                        <li>
                            <a href="#" id="btnCadCidade"><i class="fa fa-fw fa-edit"></i>Cadastro Cidade</a>
                        </li>
                        <li>
                            <a href="#" id="btnCadBairro"><i class="fa fa-fw fa-edit"></i>Cadastro Bairro</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#edicao"><i class="fa fa-fw fa-arrows-v"></i>Edição<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="edicao" class="collapse">
                        <li>
                            <a href="#" id="btnEditCliente"><i class="fa fa-fw fa-edit"></i>Editar Cliente</a>
                        </li>
                        <li>
                            <a href="#" id="btnEditMaquina"><i class="fa fa-fw fa-edit"></i>Editar Maquinas</a>
                        </li>
                        <li>
                            <a href="#" id="btnEditOs"><i class="fa fa-fw fa-edit"></i>Editar Os</a>
                        </li>
                        <li>
                            <a href="#" id="btnEditItens"><i class="fa fa-fw fa-edit"></i>Editar Itens</a>
                        </li>
                        <li>
                            <a href="#" id="btnEditFornecedor"><i class="fa fa-fw fa-edit"></i>EditarFornecedor</a>
                        </li>
                        <li>
                            <a href="#" id="btnEditMarcas"><i class="fa fa-fw fa-edit"></i>Editar Marcas</a>
                        </li>
                        <li>
                            <a href="#" id="btnEditCidade"><i class="fa fa-fw fa-edit"></i>Editar Cidade</a>
                        </li>
                        <li>
                            <a href="#" id="btnEditBairro"><i class="fa fa-fw fa-edit"></i>Editar Bairro</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#usuario"><i class="fa fa-fw fa-arrows-v"></i>Usuarios<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="usuario" class="collapse">
                        <li>
                            <a id="btnCadLogin" href="#"><i class="fa fa-list-alt"></i> Cadastrar Login</a>
                        </li>
                        <li id="divNivelAcesso">
                            <a id="btnEditLogin" href="#"><i class="fa fa-list-alt"></i> Editar Login</a>
                        </li>
                    </ul>
                </li>
                <!--  <li>
                      <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                  </li>
                  <li>
                      <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                  </li> -->
                <!--
                <li>
                    <a href="../horarios.php"><i class="fa fa-fw fa-dashboard"></i> Visualizar Horarios</a>
                </li> -->
                <li>
                    <a href="./pages/logout.php"><i class="fa fa-fw fa-users"></i> Sair</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid" id="conteudo_principal">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Painel<small>Administrador</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="./admin.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Painel Administrador
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
    <!-- /#muda alert -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Outras Funçoes -->
    <script src="js/bootstrap-checkbox.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/jmask.js" type="text/javascript"></script>
    <script src="js/md5.js"></script>

    <!-- Funcoes JavaScript -->
    <script type=text/javascript>
        $(function() {
            $("#a").keypress(function() {
                $("div#divNivelAcesso").hide();
            });
        });
    </script>
    <script type="text/javascript">
        $("#btnCadCliente").click(function(){
            $("#conteudo_principal").load("./pages/cad-cliente.php");
        });
        $("#btnCadMaquinas").click(function(){
            $("#conteudo_principal").load("./pages/cad-maquinas.php");
        });
        $("#btnCadItens").click(function(){
            $("#conteudo_principal").load("./pages/cad-Itens.php");
        });
        $("#btnCadCidade").click(function(){
            $("#conteudo_principal").load("./pages/cad-cidade.php");
        });
        $("#btnCadBairro").click(function(){
            $("#conteudo_principal").load("./pages/cad-bairro.php");
        });
        $("#btnCadLogin").click(function(){
            $("#conteudo_principal").load("./pages/cad-usuario.php");
        });
        $("#btnEditLogin").click(function(){
            $("#conteudo_principal").load("./pages/edit-usuario.php");
        });
    </script>
    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;

        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){

                var div = this.parentElement;

                div.style.opacity = "0";

                setTimeout(function(){ div.style.display = "none"; }, 6);
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () { $('#esconder').fadeOut(700);
            }, 1000);
        });
    </script>

</body>

</html>
