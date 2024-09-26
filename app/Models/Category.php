<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

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
    public function products(){
        return $this->hasMany('App\Models\Product','category_id','category_id');
    }
}
