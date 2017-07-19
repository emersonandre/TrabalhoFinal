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

$sql="SELECT 
          eq_id as id
          , eq_sigla as sigla 
          , eq_nome as nome 
          , mar_nome as marca          
        FROM 
            eq_equipamento e 
            inner JOIN mar_marca m on (e.Mar_marca_Mar_id = m.mar_id)
        ";

$tabela = "<table class='table table-hover'>
                <thead BGCOLOR=black>
                  <tr>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Código</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Sigla</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Nome</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Marca</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Ação</th>
                  </tr>
                </thead>
              <tbody>";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tabela .="<tr>";
        $tabela .="<td class='alin-table'>".$row["id"]."</td>";
        $tabela .="<td class='alin-table'>".$row["sigla"]."</td>";
        $tabela .="<td class='alin-table'>".$row["nome"]."</td>";
        $tabela .="<td class='alin-table'>".$row["marca"]."</td>";
        $tabela .="<td class='alin-table'><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluirEquip($(this).val())' ><span class='badge'><i class='fa fa-trash-o fa-lg'></i></span> Deletar</a></button></td>";
        "<br>";
    }
}
$tabela .= "</tbody></table>";

echo  $tabela;
?>