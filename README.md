

# Sistema de Registro de Ponto

Este projeto é uma aplicação desenvolvida em Laravel para gerenciar o registro de ponto de funcionários e gerenciar suas informações. Ele oferece dois níveis de acesso: **Funcionário** e **Administrador**.

---

## 🚀 Funcionalidades

### Funcionário
- Registro de ponto (autenticado).
- Troca de senha.

### Administrador
- Cadastro de funcionários.
- Listagem de funcionários.
- Edição de informações de funcionários.
- Remoção de funcionários.
- Visualização e filtro de registros de ponto.

---

## 🛠 Tecnologias Utilizadas

- **Backend**: PHP 8+, Laravel (última versão).
- **Banco de Dados**: MySQL (última versão).
- **Autenticação**: JWT (JSON Web Tokens).

---

## 📂 Estrutura de Pastas

```plaintext
project/
├── app/
│   ├── Http/
│   │   ├── Controllers/    # Controladores (lógica de negócio)
│   │   ├── Middleware/     # Middleware para requisições
│   │   └── Requests/       # Validação de requisições
│   ├── Models/             # Modelos Eloquent
│   ├── Services/           # Serviços auxiliares
│   
├── routes/
│   ├── api.php             # Rotas da API
│   └── web.php             # Rotas web
├── database/
│   ├── migrations/         # Migrações de banco de dados
│   ├── seeders/            # Seeders para popular dados
├── tests/
│   ├── Feature/            # Testes de funcionalidades
│   └── Unit/               # Testes unitários
├── public/                 # Arquivos públicos (index.php, assets)
├── resources/              # Views e arquivos estáticos
└── README.md               # Documentação


📦 Instalação

Requisitos
PHP 8+
Composer
MySQL (última versão)


git clone https://github.com/seu-usuario/api-employee-manager.git
cd api-employee-manager

composer install

php artisan key:generate
php artisan migrate --seed
php artisan serve


** Login: POST /api/login **

{
    "email": "tarcisiosilva@gmail.com",
    "password": "21345090"
}


Cadastrar Users: POST /api/register (Autenticado)
{
     "name": "tarcisiosilva",
	   "cpf":"000000000000",
	   "email": "tarcisio@gmail.com.br",
		 "password": "21345090",
	 	 "position":1,
	   "cep":"21345090",
		 "dob":"18-04-2024",
	   "address":"Rua Frederico Maurer,982",
			"complements": "Casa 13",
			"city":"Curitiba",
			"state":"PR",
			"country":"Brasil",
			"phone":"999999999",
	   "supervisor_id":1
}

Listar Users: GET /api/users (Autenticado)


Detalhe User : GET /api/users/{id} (Autenticado)

Atualizar User : PUT /api/users/{id} (Autenticado)

{
     "name": "tarcisiosilva",
	   "cpf":"11975213725",
	   "email": "tarcisio@gmail.com.br",
		 "password": "21345090",
	 	 "position":1,
	   "cep":"21345090",
		 "dob":"18-04-1988",
	   "address":"Rua Frederico Maurer,982",
			"complements": "Casa 13",
			"city":"Curitiba",
			"state":"PR",
			"country":"Brasil",
			"phone":"999999999",
	   
}


Delete  User: DELETE /api/users/{id} (Autenticado)


Authorization: Bearer <seu_token>


