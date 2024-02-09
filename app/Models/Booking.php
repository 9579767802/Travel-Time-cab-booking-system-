<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'driver_id',
        'to_date',
        'from_date',
        'to_location',
        'from_location',
        'status',
    ];
    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class,'id','vehicle_id');
    }

    public function driver()
    {
        return $this->hasOne(Driver::class,'id','driver_id');
    }
}

