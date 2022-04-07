<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function images()
    {
        return $this->hasMany(PostImage::class)->orderBy('id', 'DESC');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function date()
    {
        return (verta($this->created_at))->format('Y/m/j H:i');
    }

    public function thumbnail()
    {
        return asset('storage/' . $this->images()->first()->image);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
