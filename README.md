# Aplicação de Busca de CEP com Laravel 11 e Vue.js 

A aplicação tem como utilidade a validação de conhecimentos técnicos para a vaga de Desenvolvedor Full Stack Pleno na empresa Revenda Mais.
Feita por Thomaz Juliann Boncompagni

## Tecnologias Utilizadas

- **Laravel 11**: Framework PHP poderoso e elegante para o desenvolvimento de aplicativos web.
- **Vue.js**: Biblioteca JavaScript progressiva para construir interfaces de usuário interativas.
- **Docker**: Conjunto de scripts Docker para Laravel que facilita o gerenciamento para desenvolvimento local.
- **PostgreSQL**: Sistema de gerenciamento de banco de dados relacional de código aberto.
- **pgAdmin**: Ferramenta de administração e desenvolvimento de banco de dados PostgreSQL.

## Funcionalidades

- **Busca de CEP**: Os usuários podem pesquisar CEPs e visualizar suas informações.
- **Cadastro de CEP**: Os usuários autenticados têm a possibilidade de cadastrar um novo CEP caso não seja encontrado na busca.
- **Painel de Login**: Acesso restrito apenas para usuários autenticados.

## Como Executar Localmente

1. Clone este repositório:

   ```
   git clone https://github.com/thomazjb/teste-thomaz-cep.git
   ```

2. entre no repositório:

   ```
   cd teste-thomaz-cep
   ```

3. Faça o build da aplicação:

   ```
   docker-compose build --no-cache
   ```

4. Levante o conteiner da aplicação:

   ```
   docker-compose up -d
   ```
   
5. Entre no terminal da aplicação 

   ```
   docker exec -it teste-thomaz-cep bash
   ```
   
6. Configure os direitos de acesso do storage do laravel para o usuário atual:

   ```
   chown -R www-data:www-data storage
   ```

7. Instale as dependências PHP com o Composer:

   ```
   composer install
   ```
8. Execute as migrações do banco de dados para criar as tabelas necessárias:

   ```
   php artisan migrate
   ```
   
9. Copie o arquivo de ambiente de exemplo:

   ```
   cp .env.example .env
   ```

10. Configure seu ambiente no arquivo `.env`, especialmente as configurações do banco de dados PostgreSQL 

11. Saia do conteiner

   ```
   exit
   ```

12. Instale as dependências JavaScript com o npm ou yarn (para isso é necessário ter o npm instalado préviamente na máquina):

   ```
   npm install
   ```

13. Compile os ativos do Vue.js:

   ```
   npm run dev
   ```

14. Acesse a aplicação em seu navegador:

   ```
   http://localhost:8081
   ```

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
