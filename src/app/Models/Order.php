<?php

namespace App\Models;

use App\Models\Product;
use App\Services\Casts\PriceCast;
use App\Services\Casts\StatusCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'fio',
        'comment',
        'status',
        'product_id',
        'product_title',
        'product_price',
        'product_count',
    ];


    protected $casts = [
        'product_price' => PriceCast::class,
        'status' => StatusCast::class,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
