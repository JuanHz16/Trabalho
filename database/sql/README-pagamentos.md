# SQL de pagamentos

O arquivo `pagamentos_pessoa3.sql` tem os dois objetos da minha parte:

- `atualizar_pagamento`: muda o status dos pagamentos ativos de um plano.
- `trg_bloqueio_pagamento`: não deixa um pagamento inativo ficar como `Pago`.

A tabela usada é `pagamento`. O pagamento fica ligado ao aluno pelo campo `student_id`.
