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
            Cadastro<small> Maquinas</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="../admin.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Cadastro Maquinas
            </li>
        </ol>
        <ol>
            <div id='div_retorno_usuario'></div>
        </ol>
        <div class="container">
            <form role="form">
                <div class="input-group">
                    <span class="input-group-addon">Nome Maquina</span>
                    <input type="text" class="form-control" id="maq_nome" placeholder="ex: João">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Data Cadastro</span>
                    <input type="text" class="form-control" id="maq_data" placeholder="ex: da Silva">
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Processador</span>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="maq_proc" class="selectpicker form-control show-tick">
                        <option value="">Selecione o Processador...</option>
                        <?php
                        $sql = "SELECT eq_id, eq_nome FROM eq_equipamento WHERE eq_sigla='PROC'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="maq_proc" value="'.$row['eq_id'].'">'.$row['eq_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Placa Mãe</span>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="maq_mae" class="selectpicker form-control show-tick">
                        <option value="">Selecione a Placa Mãe...</option>
                        <?php
                        $sql = "SELECT eq_id, eq_nome FROM eq_equipamento WHERE eq_sigla='MOBA'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="maq_mae" value="'.$row['eq_id'].'">'.$row['eq_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Memoria</span>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="maq_memo" class="selectpicker form-control show-tick">
                        <option value="">Selecione a Marca da Memoria...</option>
                        <?php
                        $sql = "SELECT eq_id, eq_nome FROM eq_equipamento WHERE eq_sigla='MEMO'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="maq_memo" value="'.$row['eq_id'].'">'.$row['eq_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Memoria</span>
                    <select id="maq_qtmemo" class="selectpicker form-control show-tick">
                        <option value="">Selecione o tamanho...</option>
                        <option value="2GB">2 GB</option>
                        <option value="4GB">4 GB</option>
                        <option value="8GB">8 GB</option>
                        <option value="16GB">16 GB</option>
                        <option value="32GB">32 GB</option>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Hard Disk</span>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="maq_hd" class="selectpicker form-control show-tick">
                        <option value="">Selecione a Marca do HD...</option>
                        <?php
                        $sql = "SELECT eq_id, eq_nome FROM eq_equipamento WHERE eq_sigla='HD'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="maq_hd" value="'.$row['eq_id'].'">'.$row['eq_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Hard Disk</span>
                    <select id="maq_qthd" class="selectpicker form-control show-tick">
                        <option value="">Selecione a Tamanho...</option>
                        <option value="80GB">80 GB</option>
                        <option value="120GB">120 GB</option>
                        <option value="280GB">280 GB</option>
                        <option value="320GB">320 GB</option>
                        <option value="500GB">500 GB</option>
                        <option value="1TB">1 TB</option>
                        <option value="2TB">2 TB</option>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Sistema Operacional</span>
                    <select id="maq_sis" class="selectpicker form-control show-tick">
                        <option value="">Selecione o Sistema...</option>
                        <option value="WINXP">Windows XP</option>
                        <option value="WIN732">Windows 7 32bit</option>
                        <option value="WIN764">Windows 7 64bit</option>
                        <option value="WIN832">Windows 8 32bit</option>
                        <option value="WIN864">Windows 8 64bit</option>
                        <option value="WIN1032">Windows 10 32bit</option>
                        <option value="WIN1064">Windows 10 64bit</option>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Fonte</span>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="maq_fonte" class="selectpicker form-control show-tick">
                        <option value="">Selecione a marca da Fonte...</option>
                        <?php
                        $sql = "SELECT eq_id, eq_nome FROM eq_equipamento WHERE eq_sigla='FONTE'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="maq_fonte" value="'.$row['eq_id'].'">'.$row['eq_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Fonte</span>
                    <select id="maq_sis" class="selectpicker form-control show-tick">
                        <option value="">Selecione a Potencia...</option>
                        <option value="GEN">GENERICA 240W</option>
                        <option value="400W">400 Wats</option>
                        <option value="430W">430 Wats</option>
                        <option value="500W">500 Wats</option>
                        <option value="550W">550 Wats</option>
                        <option value="600W">600 Wats</option>
                        <option value="650W">650 Wats</option>
                        <option value="700W">700 Wats</option>
                        <option value="800W">800 Wats</option>
                        <option value="1000W">1000 Wats</option>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">VGA</span>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="maq_vga" class="selectpicker form-control show-tick">
                        <option value="">Selecione a VGA...</option>
                        <?php
                        $sql = "SELECT eq_id, eq_nome FROM eq_equipamento WHERE eq_sigla='VGA'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="maq_vga" value="'.$row['eq_id'].'">'.$row['eq_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                </br>
                <div class="input-group">
                    <span class="input-group-addon">Cliente</span>
                    <?php require '../conexao/bd/conecta.php'; ?>
                    <select id="maq_cli" class="selectpicker form-control show-tick">
                        <option value="">Selecione o Cliente...</option>
                        <?php
                        $sql = "SELECT cli_id,concat(Cli_nome ,' ',Cli_sobrenome) cli_nome FROM cli_cliente";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option id="maq_cli" onChange="insereVariacao()" value="'.$row['cli_id'].'">'.$row['cli_nome'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                </br>
                <button id="btnGravarMaq" type="button" class="btn btn-success">Gravar</button>
                <button type="reset" value="Limpar" class="btn btn-warning" >Limpar</button>
            </form>
        </div>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-file"></i> Maquinas Cadastradas
            </li>
        </ol>
        <div class="container">
            <div class="table-responsive" id="div_carrega_usuarios">
                <?php //include '../conexao/carrega-cliente.php';  ?>
            </div>
        </div>
    </div>
</div>
<!--
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
<!--
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
<!--
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
<!--
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