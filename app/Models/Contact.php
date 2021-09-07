<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'name', 'email', 'subject', 'message', 'status'
    ];

    public function scopeMessage()
    {
        $count = self::latest()->where('status',0)->get();
        return count($count);
    }

    public function scopeMessageShow()
    {
        return self::latest()->where('status',0)->take(3)->get();
    }
}
