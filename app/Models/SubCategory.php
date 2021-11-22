<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory;
    use CrudTrait;
    
    protected $fillable = [
        'name','status','category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
