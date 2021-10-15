<?php

namespace App\Traits;

use App\Models\Course;
use App\Models\Payment;
use App\Models\PrivatePayment;

trait Buyer
{
    public function payments()
    {
        return $this->hasMany(Payment::class)->whereStatus(1);
    }

    public function sales()
    {
        return $this->hasMany(Payment::class, 'owner_id')->whereStatus(1);
    }

    public function hasPurchasedCourse(int $id): bool
    {
        return $this->payments()->where('course_id', $id)->exists();
    }

    public function private_payments()
    {
        return $this->hasMany(PrivatePayment::class, 'buyer_id')
            ->whereStatus(1);

    }

    public function hasPurchasedPrivate(int $id): bool
    {
        return $this->private_payments()->where('user_id', $id)->exists();
    }
}
