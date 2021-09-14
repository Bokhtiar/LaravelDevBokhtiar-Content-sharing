<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'user_id', 'order_id', 'quantity', 'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }



    public static function total_item_cart(){

        if (Auth::check()) {
          $cart=Cart::where('user_id',Auth::id())
                    ->where('order_id',NULL)
                    ->get();
        }else {
            $cart=Cart::where('order_id',NULL)
                      ->get();
          }
        $total_item=0;
        foreach ($cart as $v_cart) {
                    $total_item +=$v_cart->quantity;
        }
        return $total_item;
        }


        public static function item_cart(){
        if (Auth::check()) {
        $cart=Cart::where('user_id',Auth::id())
                ->where('order_id',NULL)
                ->get();
        }else {
            $cart=Cart::where('order_id',NULL)
                      ->get();
          }
        return $cart;
        }

}
