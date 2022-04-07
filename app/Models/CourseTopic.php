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

    public function approve(): void
    {
        $this->update(['approved' =>  1]);
    }

    public function reject(): void
    {
        $this->update(['approved' =>  3]);
    }

    public function toggleApprove(): void
    {
        $this->approved === 1 ? $this->reject() : $this->approve();
    }
}
