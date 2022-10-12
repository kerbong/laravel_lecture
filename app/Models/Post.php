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
        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        //     $query->
        //     whereExists(fn($query)=>
        //         $query->from('categories')
        //         ->whereColumn('categories.id', 'posts.category_id')->where('categories.slug', $category))
        // );
        $query->whereHas('category', fn($query)=>$query->where('slug', $category))
    );

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


