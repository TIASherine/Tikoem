<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'cart_id';
    protected $fillable = ['user_id'];
    protected $table = 'cart';

    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
