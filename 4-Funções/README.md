#LISTA DE EXERCÍCIOS: FUNÇÕES EM PHP

*Parte A: Exercícios Teóricos*

**Conceito de função:** Uma função é um bloco de código com escopo local que executa uma tarefa específica e automatiza um processo de forma organizada, funcionando com uma maquina que recebe parâmetros, sendo suas principais qualidades a reutilização aonde você só chama a função preedefinida e usa em várias partes e a manuntenção aonde para alterar algo no bloco de código várias vezes, por ter a usado você consgue só alterar no bloco "raiz" da função.

**Princípio DRY (Don't Repeat Yourself):** Repetindo o mesmo bloco de código causa problema se você por exemplo precisar alterar algo nele, aonde na função você altera só a mesma, porque você foi a chamando conforme a necessidade, e uma alteração vale para todas

**Parâmetros e retorno:** Os parâmetros são as entradas, valores que entram como como $preco $quantidade que viram do usuário, e retorno é o valor que retornará após os parâmetros serem passados pela função que no caso é o: return $preco * $quantidade;

```PHP
 function calcularTotal(float $preco, int $quantidade): float {
    return $preco * $quantidade;
}
```

**Tipagem:** Por boa prática diferente do PHP as função são tipadas por boa prática. *string:* é texto como um nome; *int:* seria recebido uma variável inteira assim como uma idade que não é quebrada em anos; e do lado de fora dos parenteses o *bool* que seria booleano e o valor a ser devolvido pela fução para o usuário que seria de "sim" ou "não" ou "false" ou "true".

```php
 function cadastrar(string $nome, int $idade): bool.
```

**void e return:** A diferença é que um tipo de tipagem aonde não se é retornado nenhum valor e return é oque vai voltar ao usuário sendo por exemplo variáveis que passaram pela função e agora estão sendo devolvidas.

**Escopo:** Porque variáveis de fora da função não podem ser acessadas pela função por serem de escopo global, seguindo a Lei de Vegas aonde se é explicado que a função só pode acessar variáveis criadas dentro da mesma, e nesse caso $cliente não irá retornar porque está de fora da função.

```php
$cliente = "Mariana";

function exibirCliente(): string {
    return $cliente;
}
```
 E duas formas de corrigir isso seriam a primeira chamando a variável como parâmetro dentro dos parenteses, aonde ela pode ser chamado do escopo global para passar pela função como local e depois ser retornada:

 ```php
$cliente = "Mariana";

function exibirCliente(string $cliente): string {
    return $cliente;
}

echo exibirCliente($cliente);
```

 e a segunda colocando um global antes da variável como podemos ver, que fala para o php em que escopo a variável esta:

 ```php
$cliente = "Mariana";

function exibirCliente(): string {
    global $cliente;
    return $cliente;
}

echo exibirCliente();
```

**Referência:** Quando você usa o &, a função não recebe uma cópia. Ela recebe um atalho (um ponteiro) que aponta diretamente para a mesma gaveta da memória onde a variável original está guardada. Se você mexer no valor ali dentro, a variável global muda na hora.

**Funções nativas:**
Bloco 1: Função strlen()A função strlen pertence à categoria de manipulação de strings e serve para contar o número total de caracteres de um texto. Ela recebe uma string como parâmetro principal e retorna um número inteiro com o comprimento exato do texto enviado.

Bloco 2: Função str_replace()A função str_replace pertence à categoria de manipulação de strings e serve para substituir termos específicos dentro de um texto. Ela recebe três parâmetros principais que são o termo buscado, o termo substituto e o texto completo, retornando uma nova string modificada.

Bloco 3: Função count()A função count pertence à categoria de manipulação de arrays e tem como finalidade contar os elementos de uma lista. Ela recebe o array desejado como parâmetro principal e gera como retorno um número inteiro correspondente ao total de itens existentes.

Bloco 4: Função trim()A função trim pertence à categoria de manipulação de strings e serve para remover os espaços vazios das extremidades de um texto. Ela recebe a string que precisa de limpeza como parâmetro e gera uma nova string corrigida sem os espaços das pontas.

Bloco 5: Função is_numeric()A função is_numeric pertence à categoria de validação de dados e serve para verificar se uma variável é um número ou um texto estritamente numérico. Ela recebe o valor testado como parâmetro e retorna um booleano indicando verdadeiro ou falso.

**Previsão de saída:**

Bloco 1: O primeiro echoA função aplicarDesconto foi definida para receber o parâmetro por valor, o que significa que ela trabalha apenas com uma cópia do dado enviado. Quando a linha echo aplicarDesconto($valor); é executada, o PHP calcula 10% de desconto sobre a cópia de 100.00, resultando em 90, e imprime esse valor na tela.

Bloco 2: O segundo echoA variável original $valor que foi criada no escopo global permaneceu completamente intacta e protegida, pois a função alterou apenas a cópia local interna dela. Por isso, quando a linha echo $valor; é executada logo em seguida, o PHP imprime o valor original da variável, que continua sendo 100.00. Como não há nenhuma quebra de linha entre os comandos, os números 90 e 100 aparecem juntos.

**Documentação:**

Bloco 1: Sintaxe da funçãoA assinatura técnica descrita na documentação oficial para declarar e invocar a estrutura da função segue o padrão estável int strlen(string $string).

Bloco 2: Parâmetro recebidoA função exige receber obrigatoriamente um único parâmetro posicional chamado $string, o qual corresponde ao texto ou à variável textual que passará pela medição de tamanho.

Bloco 3: Tipo de retornoO valor gerado como resposta após o processamento é do tipo inteiro (int), que representa o comprimento total avaliado com base na quantidade exata de bytes que a informação ocupa na memória do servidor.