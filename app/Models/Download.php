<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $appends = ['shamsi_date'];


    public function getShamsiDateAttribute()
    {
        $v = verta($this->created_at);
        $v->timezone = "Asia/Tehran";
        return $v->format('Y/n/j H:i:s');
    }

}
