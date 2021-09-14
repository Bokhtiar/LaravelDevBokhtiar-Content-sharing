<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopHeaders extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'email',
        'phone',
        'time',
    'website_name',
    ];
}
