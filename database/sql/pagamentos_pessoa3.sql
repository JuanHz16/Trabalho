-- Objetos da minha parte: pagamentos

CREATE OR REPLACE PROCEDURE atualizar_pagamento(
    p_status_pagamento varchar DEFAULT 'Devendo',
    p_plano varchar DEFAULT 'Anual',
    p_pagamento_novo varchar DEFAULT 'Pago'
)
LANGUAGE plpgsql
AS $$
BEGIN
    UPDATE pagamento
    SET status_pagamento = p_pagamento_novo
    WHERE status_pagamento = p_status_pagamento
      AND plano = p_plano
      AND ativo = TRUE;
END;
$$;

CREATE OR REPLACE FUNCTION bloqueia_pagamento()
RETURNS TRIGGER
LANGUAGE plpgsql
AS $$
BEGIN
    IF NEW.ativo = FALSE AND NEW.status_pagamento = 'Pago' THEN
        RAISE EXCEPTION
            'O aluno % está inativo e não pode ter o pagamento como Pago',
            NEW.student_id;
    END IF;

    RETURN NEW;
END;
$$;

DROP TRIGGER IF EXISTS trg_bloqueio_pagamento ON pagamento;

CREATE TRIGGER trg_bloqueio_pagamento
BEFORE UPDATE ON pagamento
FOR EACH ROW
EXECUTE FUNCTION bloqueia_pagamento();

-- Exemplos:
-- CALL atualizar_pagamento('Devendo', 'Anual', 'Pago');
-- UPDATE pagamento SET status_pagamento = 'Pago' WHERE student_id = 1;
