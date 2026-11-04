# Rotas de pagamentos

Estas são as rotas que eu criei para a parte de pagamentos.

## Rotas web

As rotas web ficam dentro do middleware `auth`.

```php
Route::resource('pagamentos', PagamentoController::class);
```

| Método | Rota | O que faz |
|---|---|---|
| GET | `/pagamentos` | Mostra a lista. |
| GET | `/pagamentos/create` | Abre o cadastro. |
| POST | `/pagamentos` | Salva um pagamento. |
| GET | `/pagamentos/{pagamento}` | Mostra os detalhes. |
| GET | `/pagamentos/{pagamento}/edit` | Abre a edição. |
| PUT/PATCH | `/pagamentos/{pagamento}` | Atualiza o pagamento. |
| DELETE | `/pagamentos/{pagamento}` | Exclui o pagamento. |

## Rotas da API

```php
Route::apiResource('pagamentos', PagamentoController::class);
```

| Método | Rota | O que retorna |
|---|---|---|
| GET | `/api/pagamentos` | Lista em JSON e com paginação. |
| POST | `/api/pagamentos` | Cria e retorna HTTP 201. |
| GET | `/api/pagamentos/{pagamento}` | Mostra um pagamento em JSON. |
| PUT/PATCH | `/api/pagamentos/{pagamento}` | Atualiza e retorna o pagamento. |
| DELETE | `/api/pagamentos/{pagamento}` | Exclui e retorna HTTP 204. |

## Exemplo de JSON

```json
{
  "student_id": 1,
  "dia_pagamento": "2026-10-10",
  "forma_pagamento": "Pix",
  "status_pagamento": "Pago",
  "plano": "Mensal",
  "ativo": true
}
```

Os status usados são `Devendo`, `Pago` e `Cancelado`. Os planos usados são `Mensal` e `Anual`.
