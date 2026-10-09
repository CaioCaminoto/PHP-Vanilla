## 8. LISTA DE EXERCÍCIOS DE FIXAÇÃO E PRÁTICA 
# PARTE A

**1 - Definição de CRUD:**
C => CREATE (criar)
R => READ (ler)
U => UPDATE (atualizar)
D => DELETE (deletar)

**2 - Anatomia do SQL Injection**
A concatenação junta o texto do código com o dado do usuário numa única string enviada ao banco. O atacante insere caracteres especiais (como aspas simples e comandos SQL) que quebram a estrutura original da consulta, permitindo alterar a lógica booleana (ex: injetando OR '1'='1') ou executar comandos arbitrários.

**3 - Mecanismo das Prepared Statements**
Na etapa prepare, o banco analisa e compila a estrutura do comando SQL, fixando a sua lógica. Na etapa execute, os dados do usuário são enviados separadamente como meros valores literais. O banco não recompila o comando, impedindo que textos digitados sejam interpretados como código SQL.

**4 - Marcadores Nomeados**
A vantagem é a clareza e a facilidade de manutenção. Marcadores nomeados deixam claro o propósito de cada parâmetro na consulta e dispensam a necessidade de manter a ordem exata de vinculação, o que seria obrigatório e propenso a erros com o ponto de interrogação.

**5 - Diferença entre Bindings**
O bindValue() vincula o valor da variável no momento exato em que é chamado. O bindParam() vincula a referência (ponteiro) da variável, lendo seu valor apenas no momento da execução ($stmt->execute()), permitindo alterar o valor da variável entre a vinculação e a execução.

**6 - Tipagem no PDO**
O risco é gerar um erro de sintaxe ou de execução no banco de dados. Sem especificar o tipo, o PDO trata a variável como string (PARAM_STR) e adiciona aspas (ex: LIMIT '10'). O PostgreSQL exige um inteiro sem aspas na cláusula LIMIT e rejeita a consulta.

**7 - Padrão DAO**
O DAO centraliza e isola todo o código de acesso e manipulação do banco de dados em uma camada dedicada. Isso atende ao Princípio de Responsabilidade Única (SRP) e facilita a manutenção, pois alterações de banco ou SQL não afetam as regras de negócio ou a interface da aplicação.

**8 - Operações de Update**
Sem a cláusula WHERE para filtrar os registros, o comando UPDATE altera todas as linhas da tabela indistintamente. Em produção, isso sobrescreve dados de todos os usuários ou produtos de forma irreversível, causando corrupção da base e parada do sistema.

**9 - Impacto da LGPD**
A empresa pode sofrer advertências, multas de até 2% do faturamento (limitadas a R$ 50 milhões por infração), bloqueio ou eliminação dos dados envolvidos, além de sanções de reputação por exposição pública e processos judiciais movidos pelos titulares afetados.