# Laravel Application

## Descrição

Esta é uma aplicação Laravel que gerencia notícias e categorias. Inclui funcionalidades CRUD para notícias e um modal para adicionar novas categorias dinamicamente.

## Pré-requisitos

- PHP 7.4 ou superior
- Composer
- MySQL ou MariaDB
- Node.js e npm
- Docker (opcional, para ambiente de desenvolvimento)

## Instalação

1. **Clone o repositório:**

    ```bash
    git clone https://github.com/seu-usuario/sua-aplicacao.git
    cd sua-aplicacao
    ```

2. **Instale as dependências do PHP:**

    ```bash
    composer install
    ```

3. **Instale as dependências do Node.js:**

    ```bash
    npm install
    ```

4. **Copie o arquivo de exemplo `.env` e configure suas variáveis de ambiente:**

    ```bash
    cp .env.example .env
    ```

    Edite o arquivo `.env` para configurar o banco de dados e outras variáveis de ambiente conforme necessário.

5. **Gere a chave da aplicação:**

    ```bash
    php artisan key:generate
    ```

6. **Execute as migrações para criar as tabelas no banco de dados:**

    ```bash
    php artisan migrate
    ```

7. **Compile os ativos front-end:**

    ```bash
    npm run dev
    ```

## Executando a Aplicação

### Localmente

1. **Inicie o servidor de desenvolvimento:**

    ```bash
    php artisan serve
    ```

    Acesse a aplicação em [http://localhost:8000](http://localhost:8000).

### Usando Docker

1. **Inicie os contêineres Docker:**

    ```bash
    docker-compose up -d
    ```

2. **Execute as migrações dentro do contêiner:**

    ```bash
    docker-compose exec app php artisan migrate
    ```

    Acesse a aplicação em [http://localhost:3000](http://localhost:3000).

## Recursos

- CRUD de notícias
- Adição dinâmica de categorias com modal
- Pesquisa de notícias por título, descrição ou categoria

## Estrutura do Projeto

- `app/`: Contém os arquivos principais da aplicação Laravel
- `public/`: Diretório de entrada para a aplicação web
- `resources/`: Contém as views Blade e os ativos front-end
- `routes/`: Define as rotas da aplicação
- `database/`: Contém as migrações e seeders do banco de dados
