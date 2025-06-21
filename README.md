# 🧑‍💻 Teste Prático – Autenticação com Laravel 10  

Sistema simples de autenticação de usuários desenvolvido com Laravel 10, PHP 8.2, Laravel Breeze. Permite cadastro, login, logout e edição de perfil com validações robustas.

## 🚀 Funcionalidades  
- Registro de usuário com nome, e-mail, senha e confirmação de senha.  
- Login e logout seguro via e-mail e senha.  
- Dashboard inicial após autenticação.  
- Edição de perfil (nome, e-mail e senha).  
- Validações: e-mails únicos, senhas fortes.  
- Upload de imagem de perfil.  

## 🛠️ Tecnologias Utilizadas  
- **Backend:** Laravel 10, PHP 8.2  
- **Frontend:** Blade, JavaScript  
- **Banco de Dados:** MySQL  
- **Autenticação:** Laravel Breeze  

## 📦 Requisitos do Sistema  
- PHP 8.2  
- Composer  
- Banco de dados MySQL
- Node.js 

## 📦 Instalação  
1. Clone o repositório:  
   ```bash  
   git clone https://github.com/davidsonts/deep_test.git   
   cd deep_test  

2. Instale as dependências::  
   ```bash  
   composer install  
   npm install && npm run dev  

3. Crie o arquivo .env:
   ```bash  
    cp .env.example .env 

4. Configure as variáveis do banco de dados no .env:

   ```bash  
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_banco
    DB_USERNAME=usuario
    DB_PASSWORD=senha

5. Gerar chave da aplicação
   ```bash  
    php artisan key:generate 

6. Certifique-se de ter criado o link simbólico:
   ```bash  
    php artisan storage:link

7. Rode as migrações:
    ```bash  
    php artisan migrate

8. Inicie o servidor:
    ```bash 
    php artisan serve  

## Links Úteis

Veja os ambientes disponíveis:

- **Desenvolvimento:** [Clique aqui](http://DEEP-249698963.us-east-1.elb.amazonaws.com)