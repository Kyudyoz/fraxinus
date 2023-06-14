<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['user'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['searchPost'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%'. $search .'%');
        });
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
