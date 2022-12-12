<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;


    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'small_descrip',
        'description',
        'original_price',
        'selling_price',
        'image',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_descrip',
    ];


    public function category()
{
   return $this->belongsTo('App\Models\Category','cate_id', 'id');
}

}