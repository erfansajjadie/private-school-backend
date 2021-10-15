<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    public function downloads()
    {
        return $this->hasMany(Download::class , 'version');
    }


}
