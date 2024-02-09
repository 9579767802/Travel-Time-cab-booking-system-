<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'license_no', 'aadhar_no', 'address'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
