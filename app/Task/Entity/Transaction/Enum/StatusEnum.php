<?php

namespace App\Task\Entity\Transaction\Enum;

enum StatusEnum: string
{
    case CREATED = 'created';
    case CONFIRMED = 'confirmed';
    case REJECTED = 'rejected';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
