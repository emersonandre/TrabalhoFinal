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

//pesquisa por id de cidade e bairro
$id_cidade = $_POST['id_cidade'];
$id_bairro = $_POST['id_bairro'];

require '../conexao/bd/conecta.php';

$sql="SELECT 
            cli_id as id
            ,Cli_nome as nome
            ,Cli_sobrenome as sob
            ,Cli_email as email
            ,Cli_endereco as ender
            ,Cli_complemento as compl
            ,Cli_telefone as fone
            ,b.Cid_nome as cidade
            ,c.Br_nome as bairro
            
        FROM 
            cli_cliente a 
            inner JOIN cid_cidade b on (a.Cid_cidade_Cid_id = b.Cid_id)
            inner JOIN br_bairro c on (a.Br_Bairro_Br_id = c.Br_id)
        ";
//verifica se cidade esta vazio
if(!empty($_POST['id_cidade'])){
    $sql.="WHERE a.Cid_cidade_Cid_id = '$id_cidade'";
}
//verifica se id bairro e cidade esta vazio.
if(!empty($id_bairro)){
    $sql.="and a.Br_Bairro_Br_id = '$id_bairro'";
}

$tabela = "<table class='table table-hover'>
                <thead BGCOLOR=black>
                  <tr>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Código</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Nome</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Sobrenome</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>email</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Endereço</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Complemento</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Fone</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Cidade</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Bairro</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Ação</th>
                  </tr>
                </thead>
              <tbody>";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tabela .="<tr>";
        $tabela .="<td class='alin-table'>".$row["id"]."</td>";
        $tabela .="<td class='alin-table'>".$row["nome"]."</td>";
        $tabela .="<td class='alin-table'>".$row["sob"]."</td>";
        $tabela .="<td class='alin-table'>".$row["email"]."</td>";
        $tabela .="<td class='alin-table'>".$row["ender"]."</td>";
        $tabela .="<td class='alin-table'>".$row["compl"]."</td>";
        $tabela .="<td class='alin-table'>".$row["fone"]."</td>";
        $tabela .="<td class='alin-table'>".$row["cidade"]."</td>";
        $tabela .="<td class='alin-table'>".$row["bairro"]."</td>";
        $tabela .="<td class='alin-table'><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluirCliente($(this).val())' ><span class='badge'><i class='fa fa-trash-o fa-lg'></i></span> Deletar</a></button></td>";
        "<br>";
    }
}
$tabela .= "</tbody></table>";

echo  $tabela;
?>