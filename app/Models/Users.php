<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as CheckAuth;
use Illuminate\Notifications\Notifiable;

class Users extends CheckAuth
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    protected $table      = 'users_db';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

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
}
