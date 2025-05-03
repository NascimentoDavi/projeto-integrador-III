<?php

namespace App\Enums;

enum BankAccountType: string
{

    case CORRENTE = 'corrente';
    case POUPANCA = 'poupanca';
    case INVESTIMENTOS = 'investimentos';
    case SALARIO = 'salario';
    case CONJUNTA = 'conjunta';
    case DIGITAL = 'digital';
    case CREDITO = 'credito';
    case PJ = 'pj';
    case PREVIDENCIA = 'previdencia';
    case PAGAMENTO = 'pagamento';

    // Retorna os valores como Array
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
