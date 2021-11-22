<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'name',
        'price',
        'piches',
        'subCategory_id',
        'category_id',
        'menu1',
        'menu2',
        'menu3',
        'menu4',
        'menu5',
        'menu6',
        'menu7',
        'menu8',
        'menu9',
        'menu10',
        'menu11',
        'menu12',
        'menu13',
        'menu14',
        'menu15',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }


}
