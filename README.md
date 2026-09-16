# Controle Acadêmico

Sistema web desenvolvido em Laravel para o projeto final de Desenvolvimento de Sistemas Web. A aplicação permite organizar alunos, cursos e matrículas de uma faculdade, demonstrando MVC, autenticação, autorização e relacionamento entre entidades.

## Integrante

- Juan Henrique Fernandes Rodrigues

## Tecnologias

Laravel 12, PHP 8.3, PostgreSQL, Blade, Tailwind CSS, Vite, Laravel Breeze, Eloquent ORM, Migrations e Seeders.

## Funcionalidades

- Cadastro, listagem, edição, visualização e exclusão de alunos;
- Cadastro e consulta de cursos;
- Registro e consulta de matrículas;
- Relacionamentos `Student hasMany Enrollment`, `Course hasMany Enrollment` e os respectivos `belongsTo`;
- Login, cadastro, logout e páginas protegidas com Laravel Breeze;
- Papéis `admin`, `secretaria` e `aluno` com permissões diferentes;
- Middleware `role` para proteger cadastros;
- `StudentPolicy` aplicada para visualizar, editar e excluir alunos;
- `StoreStudentRequest` para validação dos dados do aluno.

## Instalação

```bash
composer install
cp .env.example .env
php artisan key:generate
# configure DB_CONNECTION=pgsql, DB_DATABASE, DB_USERNAME e DB_PASSWORD no .env
npm install
npm run build
php artisan migrate:fresh --seed
php artisan serve
```

## Usuários de teste

Todos usam a senha `12345678`:

| Papel | E-mail |
|---|---|
| Administrador | admin@faculdade.test |
| Secretaria | secretaria@faculdade.test |
| Aluno | ana@faculdade.test |

## Demonstração sugerida

1. Entrar como administrador e demonstrar dashboard, CRUD de aluno e exclusão protegida por Policy.
2. Entrar como secretaria e demonstrar cadastro/edição, observando que não pode excluir aluno.
3. Entrar como aluno e demonstrar que pode consultar apenas sua ficha, sem acesso às ações administrativas.
4. Criar uma matrícula e mostrar o relacionamento aluno-curso.
5. Enviar um formulário inválido para demonstrar as mensagens do Form Request.
6. Executar `php artisan migrate:fresh --seed` para demonstrar reconstrução do banco.
