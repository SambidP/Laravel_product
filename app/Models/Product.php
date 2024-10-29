<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey="product_id";
    protected $table = "products";
    protected $fillable = [
        'product_id',
        'name',
        'display_name',
        'code',
        'image_path',
        'description',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

