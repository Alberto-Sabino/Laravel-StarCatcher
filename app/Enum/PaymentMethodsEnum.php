<?php

namespace App\Enum;

enum PaymentMethodsEnum: string
{
    case CASH = 'cash';
    case CREDIT_CARD = 'credit_card';
    case DEBIT_CARD = 'debit_card';
    case PIX = 'pix';

    public static function values(): array
    {
        return [
            self::CASH->value,
            self::CREDIT_CARD->value,
            self::DEBIT_CARD->value,
            self::PIX->value
        ];
    }
}
