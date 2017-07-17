--consultas sql

-- Consultar os clientes cadastrados.
select 
	*
from 
	cli_cliente 

-- saber o id da maquina, nome da maquina, nome e email do cliente e os cadastradas
select 
	o.Os_id
	,m.Maq_id
    ,m.Maq_nome
    ,c.cli_nome
    ,c.cli_email
from 
	os_os o
    ,cli_cliente c
    ,maq_maquina m
WHERE	
	o.Maq_maquina_maq_id = m.Maq_id
    and m.cli_cliente_Cli_id = c.Cli_id
	
--saber o id, nome e fornecedro de cada marca 
select 
	m.Mar_id
    , m.mar_nome
    , f.For_nome
    , f.For_telefone 
from 
	mar_marca m
    , for_fornecedor f 
where 
	m.For_fornecedor_For_id = f.For_id

--bairros que pertencem a cidade de chapeco
select 
	c.Cid_sigla
    , c.Cid_nome
    , b.Br_sigla
    , b.Br_nome 
from 
	cid_cidade c
    , br_bairro b 
where 
	c.Cid_id=b.Cid_cidade_Cid_id
    and c.cid_nome = 'Chapecó'

-- saber o nome e email do dono de cada maquina
select 
	c.Cli_id
    , c.Cli_nome
    , c.Cli_email
    , m.* 
from 
	cli_cliente c
    , maq_maquina m  
where 
	c.Cli_id=m.Cli_Cliente_Cli_id