<?php
session_set_cookie_params(6600);
session_start();
if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
{
    header('location:../login/logar.html');
}
$id_user = $_SESSION['id'];
$logado = $_SESSION['login'];
$acesso = $_SESSION['acesso'];
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Cadastro<small> Equipamentos</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="../admin.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Cadastro Equipamentos
            </li>
        </ol>
        <ol>
            <div id='div_retorno_usuario'></div>
        </ol>
        <div class="container">
            <form role="form">
                <div class="input-group">
                    <span class="input-group-addon">Sigla</span>
                    <input type="text" class="form-control" id="eq_sig" placeholder="ex: João">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Nome</span>
                    <input type="text" class="form-control" id="eq_nome" placeholder="ex: da Silva">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Marca</span>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="eq_marca" class="selectpicker form-control show-tick">
                        <option value="">Selecione a Marca...</option>
                        <?php
                        $sql = "SELECT mar_id, mar_nome FROM mar_marca WHERE 1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="eq_marca" value="'.$row['mar_id'].'">'.$row['mar_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                </br>
                <button id="btnGravarEquip" type="button" class="btn btn-success">Gravar</button>
                <button type="reset" value="Limpar" class="btn btn-warning" >Limpar</button>
            </form>
        </div>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-file"></i> Equipamentos Cadastrados
            </li>
        </ol>
        <div class="container">
            <div class="table-responsive" id="div_carrega_eq">
                <?php include '../conexao/carrega-equipamentos.php';  ?>
            </div>
        </div>
    </div>
</div>
<script>
    $("#btnGravarEquip").click(function(){
        $.ajax({
            type:'post',
            url:'./conexao/grava-equipamento.php',
            async:false,
            data:{
                'eq-sig':$('#eq_sig').val(),
                'eq-nome':$('#eq_nome').val(),
                'eq-marca':$('#eq_marca').val(),
            },
            timeout: '10000',
            success: function(){
                alert("Mensagem: Equipamento Cadastrado com Sucesso!" );
                $('#div_carrega_eq').load('./conexao/carrega-equipamentos.php');
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("Error: " + errorThrown);
                $('#div_carrega_eq').load('./conexao/carrega-equipamentos.php');
            }
        });
    });
</script>
<script>
    function aoClicarExcluirEquip(id){
        $.ajax({
            type:'post',
            url: './conexao/deleta-equipamento.php',
            data: {'id':id},
            timeout: '10000',
            success: function(){
                alert("Mensagem: Equipamnento Deletado com Sucesso!" );
                $('#div_carrega_eq').load('./conexao/carrega-equipamentos.php');
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("Error: " + errorThrown);
                $('#div_carrega_eq').load('./conexao/carrega-equipamentos.php');
            }
        });
    };
</script>