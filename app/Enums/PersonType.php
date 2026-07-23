<?php

namespace App\Enums;

enum PersonType: string
{
    case VISITOR = 'visitor';
    case CONGREGANT = 'congregant';
    case MEMBER = 'member';

    public function label(): string
    {
        return match ($this) {
            self::VISITOR => 'Visitante',
            self::CONGREGANT => 'Congregado',
            self::MEMBER => 'Membro',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $type) => [
                $type->value => $type->label(),
            ])
            ->toArray();
    }
}
