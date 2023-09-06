<?php

namespace App\Task\Entity\Transaction\Enum;

enum TitleEnum: string
{
    case ORDER = 'order';
    case PENALTY = 'penalty';
    case GIFT = 'gift';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
