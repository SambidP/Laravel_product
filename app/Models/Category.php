<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = "category_id";

    protected $table = "categories";
    protected $fillable = [
        'category_id',
        'name',
        'display_name',
        'code',
        'image_path',
        'description',
    ];
}
