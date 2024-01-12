<?php

namespace app\enums;

enum ImageStatusEnum: int
{
    case Declined = 0;
    case Accepted = 1;

    public function label(): string
    {
        return match ($this) {
            self::Declined => 'Отклонена',
            self::Accepted => 'Одобрена',
        };
    }

    public function cssClass(): string
    {
        return match ($this) {
            self::Declined => 'red',
            self::Accepted => 'green',
        };
    }
}