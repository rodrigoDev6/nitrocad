<h1>Apliação de cadastro de usuarios e controle de permissão</h1>

<h3>Como rodar a aplicação :</h3>
<ol>
    <li>
        Faça o clone ou baixe este repositório no github.
    </li>
    <li>
        Crie um arquivo .env ou copie o .env.example e o renomeie para .env.
    </li>
    <li>
        Rode no dentro da pasta do projeto o composer update para baixar as dependencias do proejto
    </li>
    <li>
        Dentro do .env adicione as configurações iniciais do seu banco de dados. <br> 
        E rode este comando para adicionar uma chave no APP_KEY: <br>
        php artisan key:generate
    </li>
    <li>
        Crie um banco de dados e rode este comando para iniciar e preencher as tabelas: <br> 
        php artisan migrate:fresh --seed
    </li>
    <li>
        Inicie seu servidor apache e seu mysql.
    </li>
    <li>
        Pronto agora basta abrir a pasta do projeto public no seu navegador.
    </li>
</ol>

<hr>

<h3>O que a aplicação faz :</h3>

<ol>
    <li>A aplicação possibilita cadastrar usuários com os seguintes atributos: nome, telefone, email, senha e nivel de permissão.</li>
    <li>
    Existem dois tipos de permissão dentro do sistema: admin e usuario padrão.
    </li>
    <li>
        O admin pode criar e excluir os usuários já registrados.
    </li>
    <li>
    O usuário padrão só pode ver uma lista de usuários cadastrados dentro do sistema. 
    </li>
</ol>

<hr>

<h3>Como realizei a tarefa de nível de permissão :</h3>

<p>Através </p>
