# Sistema de Gestão de Clientes (SGC)
---

# Sobre o Sistema

O **Sistema de Gestão de Clientes (SGC)** é uma aplicação web desenvolvida para auxiliar no gerenciamento de informações de empresas, clientes e colaboradores.

O sistema centraliza os dados em um painel administrativo, permitindo que administradores realizem o cadastro, visualização, edição e remoção de registros de forma simples e organizada.

O painel administrativo foi desenvolvido utilizando **Filament**, proporcionando uma interface moderna e eficiente para a gestão dos dados.

---

# Funcionalidades do Sistema

O sistema possui os seguintes módulos principais:

## Gestão de Empresas

- Cadastro de empresas
- Armazenamento de dados como nome, e-mail, CNPJ e telefone
- Listagem de empresas cadastradas
- Edição e exclusão de registros

## Gestão de Clientes

- Cadastro de clientes
- Registro de dados como nome, e-mail, CPF e telefone
- Listagem de clientes cadastrados
- Atualização e remoção de registros

## Gestão de Colaboradores

- Adição de colaboradores a empresa
- Remoção de colaboradores da empresa
- Visualização de colaboradores

## Painel Administrativo

- Tela inicial (dashboard)
- Tela de empresa
- Tela de clientes
- Tela de colaboradores

## Fluxo 
- Cadastre-se no sistema
- Crie uma empresa
- Adicione clientes e colaboradores

##Níveis de acesso
#O sistema possui 3 níveis de acesso
-Nível 1 - Administrador
-Nível 2 - Gerente
-Nível 3 - Usuário padrão 
 

## Configuração do ambiente

* PHP 8.3+
* Laravel 12.53.0
* Livewire 3.6.4
* Filament 3.2

---

# Instalação

Clone o repositório:

```bash
git clone https://github.com/Jadson2018/kasterweb-teste-dev.git
```

Entre na pasta do projeto:

```bash
cd seu-repositorio
```

Instale as dependências do PHP:

```bash
composer install
```

Copie o arquivo de configuração do ambiente:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Crie o banco de dados testebd e Configure o banco de dados no arquivo `.env`:

```
DB_CONNECTION=mysql
DB_DATABASE=testebd
DB_USERNAME=root
DB_PASSWORD=
```

---

# Migrations e Seeders

Execute as migrations para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

execute:

```bash
php artisan db:seed
```

para popular o banco de dados

---

# Execução do Projeto

Inicie o servidor local do Laravel:

```bash
php artisan serve
```

A aplicação ficará disponível em:

```
http://localhost:8000
```

Painel administrativo (Filament):

```
http://localhost:8000/admin
```

---

# Estrutura do Projeto

Algumas pastas importantes do projeto:

```
app/            -> lógica da aplicação
database/       -> migrations, factories e seeders
resources/      -> views e arquivos front-end
routes/         -> rotas da aplicação
```

---

# Observações

* O arquivo `.env` não é versionado no Git por conter informações sensíveis.
* Certifique-se de configurar corretamente o banco de dados antes de executar as migrations.

---


If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
