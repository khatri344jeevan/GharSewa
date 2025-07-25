<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'service_id',
        'provider_id',
        'scheduled_date',
        'status',
        'note',
    ];

    // Relationships
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }



    public function provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'provider_id');
    }



    // task ko lagi haleko 
    public function package()
    {
        return $this->belongsTo(Package::class, 'service_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
