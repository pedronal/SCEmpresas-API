# API de Empreendimentos de Santa Catarina

## Descrição do Projeto

Este projeto consiste no desenvolvimento de uma API REST para gerenciamento de empreendimentos no estado de Santa Catarina. A aplicação permite realizar operações de cadastro, listagem, edição e remoção de empreendimentos, seguindo o modelo CRUD (Create, Read, Update, Delete).

O sistema foi desenvolvido utilizando PHP com o framework Laravel e tem como objetivo disponibilizar um serviço back-end responsável por gerenciar informações sobre empreendimentos e seus respectivos segmentos de atuação.

Cada empreendimento possui as seguintes informações:

- Nome do empreendimento
- Nome do(a) empreendedor(a) responsável
- Município de Santa Catarina
- Segmento de atuação
- E-mail ou meio de contato
- Status (ativo ou inativo)

Os segmentos disponíveis são:

- Tecnologia
- Comércio
- Indústria
- Serviços
- Agronegócio

Esses segmentos são armazenados em uma tabela relacional no banco de dados, garantindo melhor organização e normalização das informações.

---

## Tecnologias Utilizadas

O projeto foi desenvolvido utilizando as seguintes tecnologias:

- PHP 8
- Laravel
- MySQL
- Composer
- XAMPP
- Postman (para testes da API)
- Git / GitHub

---

## Arquitetura do Projeto

O projeto foi estruturado seguindo uma separação de responsabilidades inspirada em princípios de Clean Architecture, organizando o código em camadas distintas para melhorar a manutenção e legibilidade.


Principais responsabilidades:

- **Controllers**: recebem requisições HTTP e retornam respostas JSON.
- **UseCases**: implementam as regras de negócio da aplicação.
- **Repositories**: definem contratos para acesso aos dados.
- **DAO**: responsável por executar consultas no banco de dados.
- **Mappers**: realizam a conversão entre entidades da aplicação e estruturas do banco de dados.
- **Resources**: transformam os dados em respostas JSON padronizadas.

---

## Estrutura do Banco de Dados

O sistema possui duas tabelas principais:

### segmentos

| Campo       | Tipo    |
|-------------|---------|
| segmento_id | integer |
| nome        | string  |

### empreendimentos

| Campo        | Tipo    |
|--------------|---------|
| id           | integer |
| nome         | string  |
| empreendedor | string  |
| municipio    | string  |
| segmento_id  | integer |
| contato      | string  |
| status       | boolean |
| flag_oculto  | boolean |

A tabela `empreendimentos` possui uma relação com a tabela `segmentos` através do campo `segmento_id`.

---

## Endpoints da API

### Listar empreendimentos


GET /api/empreendimentos


### Buscar empreendimento por ID


GET /api/empreendimentos/{id}


### Criar empreendimento


POST /api/empreendimentos


### Atualizar empreendimento


PUT /api/empreendimentos/{id}


### Remover empreendimento


DELETE /api/empreendimentos/{id}


### Listar segmentos


GET /api/segmentos


---

## Como executar o projeto

1. Clonar o repositório


git clone <URL_DO_REPOSITORIO>


2. Acessar a pasta do projeto


cd projeto


3. Instalar dependências


composer install


4. Configurar o arquivo `.env`

Copie o arquivo de exemplo:


cp .env.example .env


Configure as credenciais do banco de dados.

5. Gerar chave da aplicação


php artisan key:generate


6. Executar as migrations e seeders


php artisan migrate --seed


7. Iniciar o servidor

Caso esteja utilizando XAMPP, acesse:


http://localhost/seu-projeto/public


---

## Testes da API

A API pode ser testada utilizando ferramentas como:

- Postman
- Insomnia

Exemplo de requisição:


GET /api/empreendimentos


---

## Vídeo Pitch

Link para o vídeo de apresentação do projeto:




No vídeo são apresentados:

- Objetivo do projeto
- Principais funcionalidades
- Demonstração da API em funcionamento
- Decisões técnicas adotadas no desenvolvimento
