<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'package_id',
        'booking_date',
        'status',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }



  public function bookingDetails() // plural
{
    return $this->hasMany(BookingDetail::class, 'booking_id', 'id');
}


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }



    //realtion with BookignPakage
    // public function bookingPackages()
    // {
    // return $this->hasMany(BookingPackage::class);
    // }

}
