<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivatePayment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function status()
    {
        if($this->status === 0) {
            return 'در انتظار پرداخت';
        }

        if($this->status === 1) {
            return 'پرداخت شده';
        }

        return 'لغو شده';
    }

}
