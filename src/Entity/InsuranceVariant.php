<?php

namespace App\Entity;

 class InsuranceVariant
{
    public const DEPOSIT = 'deposit';
    public const OVERPAYMENT = 'overpayment';
    public const PENALTY = 'penalty';
    public const UNDERPAYMENT = 'underpayment';

    public static function getVariants(): array
    {
        return [
            self::DEPOSIT,
            self::OVERPAYMENT,
            self::PENALTY,
            self::UNDERPAYMENT,
        ];
    }
}
