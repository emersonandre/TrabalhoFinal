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
            Cadastro<small> Cliente</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="../admin.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Cadastro Cliente
            </li>
        </ol>
        <ol>
            <div id='div_retorno_usuario'></div>
        </ol>
        <div class="container">
            <form role="form">
                <div class="input-group">
                    <span class="input-group-addon">Nome</span>
                    <input type="text" class="form-control" id="user_nome" placeholder="ex: João">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Sobrenome</span>
                    <input type="text" class="form-control" id="user_sob" placeholder="ex: da Silva">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Email</span>
                    <input type="email" class="form-control" id="user_email" placeholder="ex:joao@hotmail.com">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Endereço</span>
                    <input type="text" class="form-control" id="user_ender" placeholder="ex:Rua A">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Complemento</span>
                    <input type="text" class="form-control" id="user_compl" placeholder="ex: ´Proximo a Rua B">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Telefone</span>
                    <input type="decimal" class="form-control" id="user_fone" placeholder="ex:49 9999-9999">
                </div>
                </br>
                <div class="form-group">
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="cid_cidade" class="selectpicker form-control show-tick">
                        <option value="">Selecione a Cidade...</option>
                        <?php
                        $sql = "SELECT cid_id, cid_nome FROM cid_cidade WHERE 1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="cid_cidade" onChange="insereVariacao()" value="'.$row['cid_id'].'">'.$row['cid_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div id='carrega_bairro'></div>
                </div>
                </br>
                <button id="btnGravarCliente" type="button" class="btn btn-success">Gravar</button>
                <button type="reset" value="Limpar" class="btn btn-warning" >Limpar</button>
            </form>
        </div>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-file"></i> Clientes Cadastrados
            </li>
        </ol>
        <div class="container">
            <div class="table-responsive" id="div_carrega_usuarios">
                <?php include '../conexao/carrega-cliente.php';  ?>
            </div>
        </div>
    </div>
</div>
<script>
    $("#btnGravarCliente").click(function(){
        $.ajax({
            type:'post',
            url:'./conexao/grava-cliente.php',
            async:false,
            data:{
                'user-nome':$('#user_nome').val(),
                'user-sob':$('#user_sob').val(),
                'user-email':$('#user_email').val(),
                'user-ender':$('#user_ender').val(),
                'user-compl':$('#user_compl').val(),
                'user-fone':$('#user_fone').val(),
                'cid-cidade':$('#cid_cidade').val(),
                'id-bairro':$('#id_bairro').val(),
            },
            timeout: '10000',
            success: function(){
                alert("Mensagem: Cliente Cadastrado com Sucesso!" );
                $('#div_carrega_usuarios').load('./conexao/carrega-cliente.php');
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("Error: " + errorThrown);
                $('#div_carrega_usuarios').load('./conexao/carrega-cliente.php');
            }
        });
    });
</script>
<!-- carrega bairro apos selecionar cidade -->
<script>
    $('#cid_cidade').change(function(){
        var cid_cidade = $('#cid_cidade').val();
        //console.log(cid_cidade);
        $.ajax({
            type:'post',
            url: './conexao/busca-bairro.php',
            data: {'cid_cidade':cid_cidade},
            erro: function(){
                alert('erro');
            },
            success: function(data){
                $("#carrega_bairro").html(data);
            }

        });
    });
</script>
<!--procura cadastros por cidade selecionado -->
<script>
    $('#cid_cidade').change(function(){
        var id_cidade = $('#cid_cidade').val();
        //console.log(id_cidade);
        $.ajax({
            type:'post',
            url: './conexao/carrega-cliente.php',
            data: {'id_cidade':id_cidade},
            async:false,
            erro: function(){
                alert('erro');
            },
            success: function(data){
                $('#div_carrega_usuarios').html(data);
            }

        });
    });
    //por bairro e cidade selecionados
</script>
<!-- function excluir dados da tabela-->
<script>
    function aoClicarExcluirCliente(id){
        $.ajax({
            type:'post',
            url: './conexao/deleta-cliente.php',
            data: {'id':id},
            timeout: '10000',
            success: function(){
                alert("Mensagem: Usuario Deletado com Sucesso!" );
                $('#div_carrega_usuarios').load('./conexao/carrega-cliente.php');
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert("Error: " + errorThrown);
                $('#div_carrega_usuarios').load('./conexao/carrega-cliente.php');
            }
        });
    };
</script>
<script>
    // O HTML da div precisa estar acima.
    // Esconde a div no início
    var div = document.getElementById('div_retorno_usuario');

    // Mostra a div após 1 minuto
    setTimeout(function() {
        div.style.display = 'none';
    }, 10000);
</script>