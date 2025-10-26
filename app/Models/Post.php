<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

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

    public function getContentAttribute($value)
    {
        $plainText = strip_tags($value);
        return Str::limit($plainText, 120, '...');
    }
}
