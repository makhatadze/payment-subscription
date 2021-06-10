<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{


    public function hasExpired()
    {
        if (is_null($this->ends_at)) {
            return false;
        }

        return $this->ends_at < now();
    }
}
