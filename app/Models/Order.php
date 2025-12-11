<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'payment_method',
        'qris_img'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }


    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $filterValue = $request->input($column);

                if ($filterValue !== 'All') {
                    $query->where($column, $filterValue);
                }
            }
        }

        return $query;
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id', 'user_id');
    }
}
