# Instalação para desenvolvimento

## Pré-requisitos:
 - Linux 
 - Docker 
 - Docker-compose 
 - Git

## Instalar com o laradock

### Baixar a ultima versão do laradock pelo git

    # git clone https://github.com/Laradock/laradock.git
### Dentro da pasta do laradock, crie um .env a partir do template do laradock

    # cp env-example .env
### Altere no novo arquivo .env a versão do mysql para a 5.7, alterando a diretiva MYSQL_VERSION. A diretiva deverá ficar como abaixo

    # MYSQL_VERSION=5.7
### Na mesma pasta onde foi clonado o laradock, clone o projeto POC-Filipe

    # git clone https://github.com/xeninhu/POC-Filipe.git POC-Filipe/
### Altere a diretiva APP_CODE_PATH_HOST do arquivo .env apontando a pasta raiz do laradock para a pasta do projeto. A diretiva deverá ficar como abaixo

    APP_CODE_PATH_HOST=../POC-Filipe
### Entre na pasta do laradock e execute o container. (Certifique-se de que não há nada sendo executado nas portas 80 e 3306).

    # docker-compose up -d nginx mysql
### Acesse o terminal do container 

    # docker-compose exec workspace bash
### Altere para o usuário laradock e retorne para a pasta do projeto

    # su - laradock
    # cd /var/www
### Instale as dependências

    # composer install
    # npm install
### Compile os arquivos javascript

    # npm run dev
### Crie o arquivo .env a partir do template

    # cp .env.example .env
### Crie a chave do aplicativo

    # php artisan key:generate
### Acesse o banco de dados mysql e crie uma database chamada poc-filipe.

    # Basta logar no mysql em localhost. Login: root | Senha: root.
### Acesse o sistema pelo navegador e seja feliz :)

    http://localhost
