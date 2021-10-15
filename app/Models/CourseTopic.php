<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sub_topics()
    {
        return $this->hasMany(__CLASS__);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
