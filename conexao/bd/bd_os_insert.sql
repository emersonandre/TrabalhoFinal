--
-- Estrutura da tabela `br_bairro`
--
INSERT INTO `br_bairro` (`Br_sigla`, `Br_nome`, `Cid_cidade_Cid_id`) VALUES
('PSF', 'PASSO DOS FORTES', 1),
('CEN', 'CENTRO', 1),
('JDI', 'JARDIN ITALIA', 1),
('EFP', 'EFAPI', 1);

--
-- Estrutura da tabela `cid_cidade`
--
INSERT INTO `cid_cidade` (`Cid_sigla`, `Cid_nome`) VALUES
('CHAP', 'Chapecó'),
('XAN', 'XANXERE'),
('XAX', 'XAXIM'),
('PIN', 'PINHALZINHO'),
('NON', 'NONOAI'),
('IT', 'ITA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eq_equipamento`
--
INSERT INTO `eq_equipamento` (`Eq_sigla`, `Eq_nome`, `Mar_marca_Mar_id`) VALUES
('HD', 'HARD DISK', '2'),
('MEM', 'MEMORIA', '1'),
('HD', 'HARD DISK', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `for_fornecedor`
--
INSERT INTO `for_fornecedor` (`For_nome`, `For_email`, `For_telefone`, `For_endereco`) VALUES
('Fornecedor A', 'fornecedora@forn.com.br', '49 99999999', 'rua a'),
('Fornecedor B', 'fornecedorb@fornecedor.com.br', '49 77777777', 'rua b'),
('Fornecedor C', 'fornecedorc@fornecedorc.com.br', '49 88888888', 'rua c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--
INSERT INTO `login` (`Log_nome`, `Log_login`, `Log_senha`, `Log_permissao`, `Log_estatus`) VALUES
('emerson', 'emerson', '5a5409c56c3042d533666ddf707cf630', 0, 0),
('joao', 'joao', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
('maria', 'maria', 'e10adc3949ba59abbe56e057f20f883e', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `maq_maquina`
--
INSERT INTO `maq_maquina` (`Maq_nome`, `Maq_data`, `Maq_processador`, `Maq_placamae`, `Maq_memoria`, `Maq_qtmemoria`, `Maq_hd`, `Maq_qthd`, `Maq_sistemaop`, `Maq_fonte`, `Maq_potenciafonte`, `Maq_vga`, `Cli_Cliente_Cli_id`) VALUES
('Maquina 1', '2017-07-10 00:00:00', 'core i5 4460', 'gygabite h81m', 'kingston', '4 gb', 'seagate', '500 gb', 'win 7 64bit', 'paralela', '220w', 'nao', 2),
('Maquina 2', '2017-07-10 00:00:00', 'Ryzen 5 1600', 'b350 msi tomahawk', 'kingston hyperx', '16gb', 'ssd kingston', '240', 'win 10 64bit', 'nzxt 80 plus', '700w', 'gtx 1060', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mar_marca`
--
INSERT INTO `mar_marca` (`Mar_sigla`, `Mar_nome`, `For_fornecedor_For_id`) VALUES
('DELL', 'DELL', 1),
('HP', 'HP DO BRASIL', 2),
('LEN', 'LENOVO', 3),
('LG', 'LG DO BRASIL', 1),
('SEA', 'SEAGATE', 1),
('KNG', 'KINGSTON', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `os_os`
--
INSERT INTO `os_os` (`Os_data`, `Os_motivo`, `Os_dataini`, `Os_datafim`, `Os_trocaequip`, `Os_Valor`, `Maq_maquina_Maq_id`, `Eq_Equipamento_Eq_id`, `Login_Log_id` ) VALUES
('2017-07-10 00:00:00', 'trocar memoria com defeito', '2017-07-10 08:00:00', '2017-07-10 11:00:00', 'N', 200, 2, 1,1),
('2017-07-10 00:00:00', 'problemas com desempenho', '2017-07-10 00:00:00', '2017-07-13 00:00:00', 'N', 160, 1, 1,2),
('2017-07-11 09:15:00', 'problemas na troca das memorias', '2017-07-12 00:00:00', '2017-07-14 00:00:00', 'N', 150, 1, 2,3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usu_usuario`
--
INSERT INTO `cli_cliente` (`Cli_nome`, `Cli_sobrenome`, `Cli_email`, `Cli_endereco`, `Cli_complemento`, `Cli_telefone`, `Cid_cidade_Cid_id`, `Br_Bairro_Br_id`) VALUES
('EMERSON', 'ANDRE', 'emersonsilvestrin@live.com', 'rua A', 'não', '49 99999999', 1, 1),
('JOAO', 'SILVA', 'joao@joao.com.br', 'rua b', 'sim', '49 88888888', 1, 2),
('MARIA', 'DA PIA', 'maria@maria.com.br', 'rua c', 'nao', '49 77777777', 1, 3);

