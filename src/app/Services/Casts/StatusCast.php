<?php

namespace App\Services\Casts;

use App\Services\ValueObjects\Status;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class StatusCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes): Status
    {
        return  Status::tryFrom($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes): string
    {
        if ($value instanceof Status) {
            return $value->value;
        }
        return $value;
    }
}
