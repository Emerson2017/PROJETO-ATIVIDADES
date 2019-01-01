# PROJETO-ATIVIDADES
Projeto Web para a gerência de tarefas com PHP. 


OBS: A SEGUINTE APLICAÇÃO FOI CONSTRUÍDA UTILIZANDO O SERVIDOR LOCAL APACHE E SGBD MYSQL, DE PREFERÊNCIA REALIZAR OS TESTES COM AS MESMAS TECNOLOGIAS(startar as tecnologias). 

1º BAIXE O REPOSITÓRIO NA URL : https://github.com/Emerson2017/PROJETO-ATIVIDADES.git

2º COLOQUE O REPOSITÓRIO BAIXADO NO NÍVEL "LOCALHOST" DO SEU SERVIDOR LOCAL, FICANDO ASSIM "LOCALHOST/PROJETO-ATIVIDADES". (caso use xampp fica em "../XAMPP/HTDOCS/PROJETO-ATIVIDADES")

3º CRIE O BANCO DE DADOS COM O NOME "tarefas" (MYSQL)

4º RODE O COMANDO "composer install" NO CAMINHO "PROJETO-ATIVIDADES/API" (Terminal linux ou algum 'cmd poderoso' como o Git Bash)

5º RODE O COMANDO "cp .env.example .env" AINDA NO CAMINHO "PROJETO-ATIVIDADES/API" (gerar arquivo .env de configurações)

6º NO ARQUIVO .env (procurar com atalho ctrl + p no sublime caso não seja visível) NO CAMINHO "PROJETO-ATIVIDADES/API/.env" setar as seguintes configurações :

DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=tarefas<br>
DB_USERNAME=root<br>
DB_PASSWORD=<br>


7º RODAR COMANDO "php artisan key:generate" NO CAMINHO "PROJETO-ATIVIDADES/API"

8º E FINALMENTE, RODAR "php artisan migrate" PARA GERAR AS TABELAS NO BANCO

9º AGORA NO SEU NAVEGADOR JÁ PODE ACESSAR "localhost/PROJETO-ATIVIDADES" E USUFRUIR DA APLICAÇÃO ! :D







