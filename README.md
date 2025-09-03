# Projeto de Oficina Mecânica

Este é um projeto de uma oficina mecânica desenvolvido em Laravel.

## Configuração e Execução

Para configurar e executar o projeto, siga os passos abaixo:

Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

Clone o repositório do projeto:

```bash
git clone https://github.com/Alberto-Sabino/Laravel-StarCatcher.git
```

Execute o Docker Compose para subir os containers do projeto:

```bash
docker-compose up -d
```

Acesse o container do banco de dados:

```bash
docker-compose exec database bash
```

Dentro do container do banco de dados, crie o banco de dados executando o comando abaixo:

```bash
/opt/mssql-tools/bin/sqlcmd -S database -U sa -P 'mec2025**' -Q 'CREATE DATABASE mec_database'
```

Saia do container do banco de dados:

Acesse o container do Laravel:

```bash
docker-compose exec laravel bash
```

Dentro do container do Laravel, instale as dependências do Composer:

```bash
composer install
```

Execute as migrações do banco de dados para criar as tabelas necessárias:

```bash
php artisan migrate
```

O projeto deve estar agora configurado e pronto para ser utilizado.

A collection do Postman com todos os endpoints dessa API pode ser encontrada em [storage/collection/collection.json](storage/collection/collection.json).

Inicialmente não foi criado uma rota para cadastro de usuário.
Sinta-se à vontade para criar, ou adicione o usuário manualmente pela linha de comando.

### Para adicionar um usuário via linha de comando

Acesse o container do Laravel.

``` bash
docker-compose exec laravel bash
```

Acesse o console do tinker:

``` bash
php artisan tinker
```

No console do tinker, use o Eloquent ou a DB facade para criar um usuário:

``` bash
# Eloquent
User::create(['name' => 'Seu nome', 'email' => 'Seu email', 'password' => 'Sua senha'])

# DB Facade
DB::table('users')->insert(['name' => 'Seu nome', 'email' => 'seuemail@newm.com', 'password' => 'Sua Senha']) 
```

Agora você poderá fazer o login passando seu e-mail e senha.


## Funcionalidades e detalhes presentes

- Autenticação via login e senha
- Autorização via Bearer token (um token simples gerado no login e salvo no cache)
- CRUD de Veículos
- CRUD de Peças
- CRUD de Ordens de serviço
- Relacionamento feito entre Ordem de Serviço, Peças e Veículos é realizado via Eloquent nas Models ServiceOrder, Car e Part.
- Existe uma tabela order_part, pois o relacionamento entre ordens de serviço e peças é N:N. Porém não é necessário fazer nada com ela manualmente, pois o Eloquent está lidando com esse relacionamento pra nós.
- Todos os repositories herdam de um BaseRepository
- Todos os repositories concretos usam eloquent e implementam um RepositoryInterface
- Todas as Services de operações do CRUD herdam de uma ServiceBase genérica
Todos os Controllers que validam dados possuem a lógica de validação abstraída em uma Request
- Cada rota possui um controller dedicado para promover o Single Responsability Principle.
- Cada service possui somente uma responsabilidade, e o nome da Service é autoexplicativo.
- Existem duas views usando blade para renderizar os relatórios.
- Foi criado um RepositoryServiceProvider para fazer o bind automático das classes concretas e classes abstratas (autoloader do laravel)
- Existe um Middleware que valida o Bearer token enviado nas rotas protegidas. Caso o token exista, o token é salvo na sessão da request e existe uma Trait que pode buscar qual é o usuário logado a partir disso.
- $😊 = "😂" não funciona!
