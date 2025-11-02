# 📚 Biblioteca API – Laravel 10 (Arquitetura S1)

Este projeto é uma API para gerenciamento de biblioteca construída com Laravel 10, seguindo boas práticas e utilizando os padrões Request → Controller → Service → Repository → Resource. Inclui autenticação via JWT, envio de e-mails com Job, seeders, factories e relacionamentos entre os modelos.

---

## 🚀 Tecnologias Utilizadas

* **Laravel 10** (PHP 8.1+)
* **MySQL**
* **JWT Auth** para autenticação
* **Mailtrap** (para testes de e-mail)
* **Queue & Jobs** (para envio de e-mail assíncrono)
* **Migrations, Seeders e Factories**

---

## 📦 Funcionalidades do Sistema

✅ Autenticação JWT (login e registro)
✅ CRUD completo de **Livros**
✅ CRUD completo de **Autores**
📂 Relacionamentos entre modelos:

* Autor → Livros (1:N)
* Categoria → Livros (1:N)
* Usuário → Empréstimos (1:N)
  📨 Job para enviar e-mail de lembrete de devolução de livros
  🧪 Banco populado com Seeders e Factories

---

## 🧱 Estrutura de Pastas (Arquitetura S1 Simples)

```
app/
 ├─ Http/
 │   ├─ Controllers/
 │   ├─ Requests/
 │   └─ Resources/
 ├─ Services/
 ├─ Repositories/
 ├─ Models/
 ├─ Mail/
 └─ Jobs/
```

* **Controller** → recebe requisição e chama o Service
* **Service** → contém regras de negócio e chama o Repository
* **Repository** → faz acesso ao banco de dados
* **Resource** → formata o retorno da API

---

## ⚙️ Instalação e Execução

### 1️⃣ Clonar o projeto

```
git clone <link-do-repo>
cd biblioteca-api
```

### 2️⃣ Instalar dependências

```
composer install
```

### 3️⃣ Criar e configurar o `.env`

```
cp .env.example .env
```

Configure o banco de dados:

```
DB_DATABASE=biblioteca
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Gerar chave da aplicação

```
php artisan key:generate
```

### 5️⃣ Configurar JWT

```
php artisan jwt:secret
```

### 6️⃣ Migrar tabelas e popular o banco

```
php artisan migrate --seed
```

### 7️⃣ Iniciar servidor

```
php artisan serve
```

> A API estará disponível em: [http://127.0.0.1:8000](http://127.0.0.1:8000)

### 8️⃣ Executar fila para Jobs

```
php artisan queue:work
```

---

## ✉️ Configurar envio de e-mail (opcional)

Para testar o job com Mailtrap:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=SEU_USER
MAIL_PASSWORD=SEU_PASS
MAIL_FROM_ADDRESS=nao-responda@biblioteca.com
MAIL_FROM_NAME="Biblioteca API"
```

---

## 🔑 Usuário padrão para login

| Campo | Valor                                                 |
| ----- | ----------------------------------------------------- |
| Email | [admin@biblioteca.test](mailto:admin@biblioteca.test) |
| Senha | senha123                                              |

### Endpoint de Login

**POST** `/api/login`

```json
{
  "email": "admin@biblioteca.test",
  "password": "senha123"
}
```

---

## 📍 Principais Endpoints

| Método | Rota            | Descrição        |
| ------ | --------------- | ---------------- |
| POST   | /api/login      | Autenticação JWT |
| GET    | /api/books      | Lista livros     |
| POST   | /api/books      | Cadastra livro   |
| PUT    | /api/books/{id} | Atualiza livro   |
| DELETE | /api/books/{id} | Remove livro     |
| GET    | /api/authors    | Lista autores    |
| POST   | /api/authors    | Cadastra autor   |

> Rotas protegidas exigem `Authorization: Bearer {token}`

---

## ⏰ Jobs

* `SendLoanReminderJob` → Envia e-mail para usuários com livros atrasados

Para testar manualmente:

```
php artisan schedule:run
```

---

## 🧪 Testes (Opcional)

Caso queira rodar testes:

```
php artisan test
```

---

## 📜 Licença

Este projeto pode ser utilizado para fins acadêmicos e estudos.

---

### 💬 Suporte

Caso precise de melhorias, documentação Swagger, Docker ou collection do Postman, estou pronto para gerar.

---

Deseja que eu gere agora também:
A) Documentação Swagger
B) Postman Collection
C) Docker Compose
D) Todos os itens acima?
