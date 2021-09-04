<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable=['name','color','description','status'];

    public function scopeDatabase(Category $category, Request $request)
    {
        $category['name'] = $request->name;
        $category['color'] = $request->color;
        $category['description'] = $request->description;
        $category->save();
    }
}
