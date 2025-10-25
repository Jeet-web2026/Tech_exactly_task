<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'status',
        'permissions'
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'permissions' => 'array',
        ];
    }

    public function getAttribute($key)
    {
        if ($key === 'created_at' && isset($this->attributes[$key])) {
            return date('d-m-Y, H:m', strtotime($this->attributes[$key]));
        }
        return parent::getAttribute($key);
    }
}
