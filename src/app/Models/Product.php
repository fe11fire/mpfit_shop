<?php

namespace App\Models;

use App\Models\Category;
use App\Services\Traits\HasSlug;
use App\Services\Casts\PriceCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'slug',
        'price',
    ];

    protected $casts = [
        'price' => PriceCast::class
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
