<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as CheckAuth;
use Illuminate\Notifications\Notifiable;

class Users extends CheckAuth
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    protected $table = 'users_db';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
}
