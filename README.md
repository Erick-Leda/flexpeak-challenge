<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre

Construído com as tecnologias Laravel, PHP 7.4.5, MySQL, Nodejs e o TailWindCss . O Laravel é um framework de aplicação web com sintaxe expressiva e elegante. Tira a dor do desenvolvimento, facilitando tarefas comuns usadas em muitos projetos da web. Laravel é acessível, poderoso e fornece ferramentas necessárias para aplicativos grandes e robustos.

## Configurações

    Tecnologias necessarias:
    * Composer
    * Laravel 
    * MySQL
    * PHP
    * TailWindcss
    * Nodejs
    * NPM

## Rodar Project

    Você deve ter como pré-requisito um database criado, com o nome 'projetoflexpeak'.
     create database projetoflexpeak;

    * Clone ou baixe este repositório e acesse o diretório:
     git clone https://github.com/Erick-Leda/flexpeak-challenge

    * Instale as dependências (More information -> https://getcomposer.org/download/)
     composer install

    * Instale os presets do framework de css TailWindCSS (More information -> https://tailwindcss.com/docs/installation)
     composer require laravel-frontend-presets/tailwindcss --dev

    * Instale a interface do TailWindCSS e adicione o sistema de autenticação
     php artisan ui tailwindcss --auth

    * Dentro do diretório do projeto executar:
    #Run npm install && npm run watch

    # Criar file .env
     copy .env.example .env

    !IMPORTANT -> Modifique .env com as seguintes credenciais:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=projetoflexpeak
    DB_USERNAME=<your_user_name>
    DB_PASSWORD=<your_password>

    # Gere a chave
    php artisan key:generate

    * Execute migrations (tables)
    php artisan migrate

    * Dentro do diretório do projeto executar:
    php artisan serve

    * Para testar, utilize o software de sua preferência (VS Code, por exemplo) e acesse: http://localhost:8000/
