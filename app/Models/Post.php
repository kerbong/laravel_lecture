<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Authenticatable
{
   use HasFactory;

    // protected $fillable = ['title', 'excerpt', 'body'];///
    protected $guarded = [];

    protected $with = ['category', 'author'];
    // protected $fillable = ['title', 'excerpt', 'body'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where("title", "like", '%' . $search . '%')->orWhere("body", "like", '%' . $search . '%'));

    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}


