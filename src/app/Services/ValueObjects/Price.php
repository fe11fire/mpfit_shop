<?php

namespace App\Services\ValueObjects;



use Stringable;
use InvalidArgumentException;
use App\Services\Traits\Makeable;

class Price implements Stringable
{
    use Makeable;

    private array $currencies = [
        'RUB' => '₽'
    ];

    public function __construct(
        private int $value,
        private string $currency = 'RUB',
        private int $precision = 100,
    ) {
        if ($this->value < 0) {
            throw new InvalidArgumentException('Price must be more than 0');
        }

        if (!isset($this->currencies[$currency])) {
            throw new InvalidArgumentException('Currence ' . $currency . ' not allowed');
        }
    }

    public function raw(): int
    {
        return $this->value;
    }

    public function value(): int|float
    {
        return $this->value / $this->precision;
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function symbol(): string
    {
        return $this->currencies[$this->currency];
    }

    public function __toString(): string
    {
        return number_format($this->value(), 2, ',', ' ') . ' ' . $this->symbol();
    }

    public function sum($count): Price
    {
        return Price::make($this->value * $count);
    }
}
