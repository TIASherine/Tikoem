<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $table      = 'product';

    protected $fillable = [
        'name',
        'price',
        'category',
        'stock',
        'supplier',
    ];

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function scopeFilter(Builder $query, $request, array $filterableColumns, array $searchableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $filterValue = $request->input($column);

                if ($filterValue !== 'All') {
                    $query->where($column, $filterValue);
                }
            }
        }

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        return $query;
    }
}