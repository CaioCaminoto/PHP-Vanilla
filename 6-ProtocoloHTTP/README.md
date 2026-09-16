
>Resoluções das atividades do bloco A (exercícios teóricos):

### 1 Diferença Estrutural: Explique a diferença física entre onde os dados são anexados em uma requisição GET e em uma requisição POST.

**Resposta:** A diferença física está no local da mensagem HTTP onde os dados trafegam. Na requisição *GET*, os dados são anexados diretamente na URL chamada também de Query String.Na requisição *POST*, a URL permanece limpa e os dados são enviados escondidos dentro do corpo (body) da requisição HTTP.

### 2 Segurança e Privacidade: Por que senhas de usuário nunca devem ser enviadas via método GET? Cite pelo menos dois locais onde essa senha ficaria gravada de forma insegura.

**Resposta:** Porque o método GET expõe os dados abertamente na URL, fazendo com que a senha seja tratada como texto comum. Se enviada via GET, a senha ficará gravada de forma insegura no histórico do navegador do usuário e nos logs de acesso do servidor web (como Apache ou Nginx), onde qualquer administrador do sistema poderia visualizá-la.

### 3 Coalescência Nula: Por que a instrução $nome = $_POST['nome']; dispara um Warning na primeira vez que a página é carregada no navegador? Como o operador ?? resolve isso?

**Resposta:** O aviso (Warning) ocorre porque, no primeiro carregamento da página, o formulário ainda não foi enviado, logo a chave 'nome' não existe no array global $_POST. O operador de coalescência nula (??) resolve isso verificando se a chave existe; se não existir, ele define um valor padrão automaticamente (ex: $_POST['nome'] ?? '';), impedindo o disparo do erro.

### 4 Idempotência: O que significa dizer que uma requisição GET é idempotente? Por que atualizar ou deletar dados no banco usando links GET é uma má prática de segurança?

**Resposta:** Idempotência significa que fazer a mesma requisição uma ou múltiplas vezes trará o mesmo resultado e não causará efeitos colaterais extras no servidor. Usar GET para alterar o banco é uma má prática porque navegadores, aceleradores de internet e robôs de busca (como o Google) pré-carregam links automaticamente. Se um robô ler seus links GET de exclusão, ele pode apagar todo o seu banco de dados sem querer.

### 5 Validação Client vs Server: Um desenvolvedor júnior afirma que o formulário dele é 100% seguro porque colocou required e type="email" em todas as tags HTML. Explique por que essa afirmação é falsa.

**Resposta:** A afirmação é falsa porque as validações HTML ocorrem apenas no navegador do cliente, onde qualquer pessoa pode desativá-las facilmente inspecionando o código e removendo os atributos required ou type. Usuários maliciosos ou scripts automatizados podem enviar dados inválidos ou perigosos diretamente para o servidor, tornando a validação no servidor (back-end) obrigatória.

### 6 XSS e Sanitização: Qual é o risco de exibir dados vindos de um $_POST diretamente na tela sem utilizar htmlspecialchars()?

**Resposta:** O risco é sofrer um ataque de XSS (Cross-Site Scripting). Se um usuário mal-intencionado digitar um código JavaScript no formulário (como <script>roubar_cookies()</script>), o navegador vai executar esse script como se fosse parte do site oficial, permitindo o roubo de sessões e dados. O htmlspecialchars() neutraliza isso transformando tags HTML em texto inofensivo.

### 7 Sticky Forms: O que é a técnica de Sticky Forms e qual é o seu impacto na experiência do usuário (UX)?

**Resposta:** É a técnica de manter os dados já digitados preenchidos no formulário após o envio, caso ocorra algum erro de validação no servidor. O impacto na experiência do usuário (UX) é altamente positivo, pois evita a frustração do usuário ter que redigitar todas as informações do zero por causa de uma única correção necessária.

### 8 DevTools: Como você utilizaria a aba Network do navegador para comprovar que um formulário foi enviado via POST e não via GET?

**Resposta:** Abra o DevTools (F12) e vá até a aba Network (Rede) antes de enviar o formulário. Clique no botão de enviar, selecione a requisição correspondente na lista e, na aba Headers (Cabeçalhos), verifique o campo Request Method (que deve constar POST). Além disso, os dados enviados aparecerão organizados na aba Payload, e não anexados no fim da URL.
