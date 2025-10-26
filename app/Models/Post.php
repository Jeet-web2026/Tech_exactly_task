<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'slug',
        'status',
        'category',
        'title',
        'content',
        'image'
    ];

    public function getAttribute($key)
    {
        if ($key === 'created_at' && isset($this->attributes[$key])) {
            return date('d-m-Y, H:i', strtotime($this->attributes[$key]));
        }
        return parent::getAttribute($key);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
