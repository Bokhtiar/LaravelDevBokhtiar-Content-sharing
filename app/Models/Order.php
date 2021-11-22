<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'f_name', 'l_name', 'user_id', 'product_id','country', 'phone', 'email', 'qty', 'payment_id',
        'USDT_Wallet','Payoneer','Perfect_Money_Usd','Webmoney','BTC_WALLET', 'status',
    ];

    public function scopeuser_id(){
        $user = User::latest()->first();
        $id = $user->id;
        return $id;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
