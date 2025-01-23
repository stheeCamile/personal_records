
# Projeto Ranking de Movimentos

Este projeto permite registrar e visualizar o **ranking de movimentos** de levantamento de peso. O sistema permite cadastrar o **recorde pessoal** de usuários e exibir o ranking com **DataTables** e **AJAX**.

## Funcionalidades

- **Cadastro de Recorde Pessoal**: Registra o **nome do usuário**, **movimento**, **recorde pessoal** e **data**.
- **Ranking com DataTable**: Exibe o ranking ordenado com **posição**, **nome do usuário**, **recorde** e **data**, usando **AJAX** para carregar os dados.

## Tecnologias

- **Laravel** (backend)
- **MySQL** (banco de dados)
- **Bootstrap 5** (design)
- **DataTables** (tabela interativa)
- **AJAX** (carregamento dinâmico)

## Como Rodar

1. Clone o repositório:
   ```bash
   git clone https://github.com/usuario/repo.git
   cd repo
   ```

2. Instale as dependências:
   ```bash
   composer install
   ```

3. Configure o banco de dados no `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_DATABASE=ranking
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Execute as migrações:
   ```bash
   php artisan migrate
   ```

5. Rode o servidor:
   ```bash
   php artisan serve
   ```

6. Acesse:
   - **Cadastro de Recorde**: `/movements`
   - **Ranking**: `/ranking-top-10`

## Rotas

- **GET `/movements`**: Formulário de cadastro de recorde.
- **POST `/ranking/personal-records`**: Salva o recorde no banco.
- **GET `/ranking-top-1`**: Exibe o ranking com DataTable.
- **GET `/api/ranking/{movementId}`**: Retorna o ranking em JSON.

## Como Funciona

1. **Cadastro**: Preencha o formulário com nome, movimento, recorde e data.
2. **Ranking**: Acesse o ranking (Deadlift), que é preenchido via **AJAX** a partir do endpoint `/api/ranking/{movementId}` ou como solicitado /api/ranking/1 para vizualizar em json.
