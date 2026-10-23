### Lista de Exercícios - TEÓRICOS 

**1-Protocolo Stateless:**
R_ O protocolo HTTP ser stateless (sem estado) significa que cada requisição entre o cliente e o servidor é tratada de forma isolada, sem que o servidor guarde qualquer memória ou histórico das requisições anteriores.

**2-Cookies vs. Sessões:**
R_ Nos cookies os dados ficam guardados e armazenados uma parte no servidor e uma parte no navegador. Já nas sessões usamos a variável global `$_SESSION` que guarda tudo no servidor.

**3-A Flag HttpOnly:**
R_Se uma aplicação possuir uma vulnerabilidade de XSS, um invasor pode injetar um script malicioso para roubar dados de sessão, mas se o cookie estiver protegido com HttpOnly o atacante não conseguirá ler o identificador da sessão.

**4-A Flag SameSite:**
R_O atributo SameSite=Lax restringe o envio de cookies em requisições feitas a partir de sites de terceiros. Ele permite o envio do cookie apenas quando o usuário realiza uma navegação em sites seguros, atuando contra o CSRF (Cross-Site Request Forgery)


**5-Ataque de Fixação de Sessão:**
R_ Ocorre quando um invasor força a vítima a usar um ID de sessão conhecido. Usar session_regenerate_id(true) após o login gera um novo ID e invalida o token antigo.

**6-MD5 e Rainbow Tables:**
R_ MD5 e SHA256 são rápidos demais, permitindo bilhões de tentativas por segundo. As Rainbow Tables usam listas pré-computadas para reverter esses hashes instantaneamente.

**7-O Papel do Salt:**
R_ Um texto aleatório somado à senha antes do hash. Ele garante que senhas iguais gerem hashes totalmente diferentes no banco de dados.

**8-Argon2id vs Bcrypt:**
R_  O Bcrypt exige apenas processamento (fácil de burlar com o poder paralelo de GPUs). O Argon2id exige muita memória RAM, o que trava o desempenho de placas de vídeo e circuitos ASIC.

**9-Timing Attacks:**
R_ •  O operador === compara strings caractere por caractere e para no primeiro erro, vazando informações pelo tempo de resposta. O password_verify() leva sempre o mesmo tempo, blindando o sistema.
