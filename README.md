# ReadVault

A modern book management and review platform built with PHP and TailwindCSS.

## Features

- **Explore Books**: Browse and search through the book collection
- **User Authentication**: Sign up and sign in to access personalized features
- **My Books**: Manage your personal book collection
- **Reviews**: Write and read reviews for books
- **Star Ratings**: Rate books from 1 to 5 stars

## Getting Started

### Prerequisites

- PHP 8.0 or higher
- MySQL database

### Installation

1. Navigate to the project directory:
```bash
cd readvault/htdocs
```

2. Configure your database in `app/config.php`:
```php
'host' => 'your_host',
'dbname' => 'your_database',
'user' => 'your_username',
'password' => 'your_password',
```

3. Import the database schema:
```sql
-- Run schema.sql in phpMyAdmin or MySQL CLI
```

4. Start the PHP development server:
```bash
php -S localhost:8000
```

5. Open your browser and visit: http://localhost:8000

### Sample User

After importing the schema, you can log in with:
- **Email**: john@example.com
- **Password**: password

## Project Structure

```
readvault/
├── htdocs/               # Public files (document root)
│   ├── index.php         # Application entry point
│   ├── .htaccess         # URL rewriting
│   └── images/           # Uploaded book covers
└── app/                  # Application code
    ├── controllers/      # Route controllers
    ├── models/           # Data models
    ├── views/            # View templates
    │   ├── partials/     # Reusable view components
    │   └── template/     # Main layout template
    ├── config.php        # Configuration settings
    ├── Database.php      # Database connection class
    ├── Flash.php         # Flash messages handler
    ├── Validation.php    # Input validation class
    ├── functions.php     # Helper functions
    └── routes.php        # Routing logic
```

## Technologies

- **PHP 8**: Backend language
- **MySQL**: Database
- **TailwindCSS 4**: Styling (via CDN)
- **MVC Architecture**: Clean code organization

---

# ReadVault

Uma plataforma moderna de gerenciamento de livros e avaliações construída com PHP e TailwindCSS.

## Funcionalidades

- **Explorar Livros**: Navegue e pesquise na coleção de livros
- **Autenticação**: Cadastre-se e faça login para acessar recursos personalizados
- **Meus Livros**: Gerencie sua coleção pessoal de livros
- **Avaliações**: Escreva e leia avaliações de livros
- **Notas**: Avalie livros de 1 a 5 estrelas

## Começando

### Pré-requisitos

- PHP 8.0 ou superior
- Banco de dados MySQL

### Instalação

1. Navegue até o diretório do projeto:
```bash
cd readvault/htdocs
```

2. Configure seu banco de dados em `app/config.php`:
```php
'host' => 'seu_host',
'dbname' => 'seu_banco',
'user' => 'seu_usuario',
'password' => 'sua_senha',
```

3. Importe o schema do banco de dados:
```sql
-- Execute schema.sql no phpMyAdmin ou MySQL CLI
```

4. Inicie o servidor PHP:
```bash
php -S localhost:8000
```

5. Abra seu navegador e acesse: http://localhost:8000

### Usuário de Teste

Após importar o schema, você pode fazer login com:
- **Email**: john@example.com
- **Senha**: password

## Estrutura do Projeto

```
readvault/
├── htdocs/               # Arquivos públicos (document root)
│   ├── index.php         # Ponto de entrada da aplicação
│   ├── .htaccess         # Reescrita de URL
│   └── images/           # Capas de livros enviadas
└── app/                  # Código da aplicação
    ├── controllers/      # Controladores de rotas
    ├── models/           # Modelos de dados
    ├── views/            # Templates de visualização
    │   ├── partials/     # Componentes reutilizáveis
    │   └── template/     # Template principal
    ├── config.php        # Configurações
    ├── Database.php      # Classe de conexão com banco
    ├── Flash.php         # Manipulador de mensagens flash
    ├── Validation.php    # Classe de validação
    ├── functions.php     # Funções auxiliares
    └── routes.php        # Lógica de rotas
```

## Tecnologias

- **PHP 8**: Linguagem backend
- **MySQL**: Banco de dados
- **TailwindCSS 4**: Estilização (via CDN)
- **Arquitetura MVC**: Organização limpa do código


