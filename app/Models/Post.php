<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'user_id',
    ];

    public function getImage(){
        return asset("storage/{$this->image}");
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, PostTag::class, 'post_id', 'tag_id', 'id', 'id');
    }
}
