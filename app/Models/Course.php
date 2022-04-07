<?php

namespace App\Models;

use App\Helpers\UploadFileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function topics()
    {
        return $this->hasMany(CourseTopic::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function($model){
            UploadFileHelper::delete($model->image);
        });
    }

    public function price()
    {
        return $this->price - $this->discount;
    }

    public function discount_percent()
    {
        return ceil(100 - ((($this->price() / $this->price)) * 100));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
