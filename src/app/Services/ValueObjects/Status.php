<?php

namespace App\Services\ValueObjects;

enum Status: string
{
    case NEW = 'new';
    case ACCEPTED = 'accepted';

    public function caption(): string
    {
        return match ($this) {
            Status::NEW => 'Новый заказ',
            Status::ACCEPTED => 'Заказ выполнен',
        };
    }
}
