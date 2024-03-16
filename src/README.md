# Aplicação de Busca de CEP com Laravel 11 e Vue.js 

A aplicação tem como utilidade a validação de conhecimentos técnicos para a vaga de Desenvolvedor Full Stack Pleno na empresa Revenda Mais.
Feita por Thomaz Juliann Boncompagni

## Tecnologias Utilizadas

- **Laravel 11**: Framework PHP poderoso e elegante para o desenvolvimento de aplicativos web.
- **Vue.js**: Biblioteca JavaScript progressiva para construir interfaces de usuário interativas.
- **Sail**: Conjunto de scripts Docker para Laravel que facilita o gerenciamento de contêineres Docker para desenvolvimento local.
- **PostgreSQL**: Sistema de gerenciamento de banco de dados relacional de código aberto.
- **pgAdmin**: Ferramenta de administração e desenvolvimento de banco de dados PostgreSQL.

## Funcionalidades

- **Busca de CEP**: Os usuários podem pesquisar CEPs e visualizar suas informações.
- **Cadastro de CEP**: Os usuários autenticados têm a possibilidade de cadastrar um novo CEP caso não seja encontrado na busca.
- **Painel de Login**: Acesso restrito apenas para usuários autenticados.

## Como Executar Localmente

1. Clone este repositório:

   ```
   git clone https://github.com/seu-usuario/nome-do-repositorio.git
   ```

2. Instale as dependências PHP com o Composer:

   ```
   composer install
   ```

3. Copie o arquivo de ambiente de exemplo:

   ```
   cp .env.example .env
   ```

4. Configure seu ambiente no arquivo `.env`, especialmente as configurações do banco de dados PostgreSQL e Sail.

5. Inicie os contêineres Docker usando o Sail:

   ```
   ./vendor/bin/sail up -d
   ```

6. Instale as dependências JavaScript com o npm ou yarn:

   ```
   npm install
   ```

7. Compile os ativos do Vue.js:

   ```
   npm run dev
   ```

8. Execute as migrações do banco de dados para criar as tabelas necessárias:

   ```
   ./vendor/bin/sail artisan migrate
   ```

9. Acesse a aplicação em seu navegador:

   ```
   http://localhost
   ```

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).