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
        'note',
    ];

    // Relationships
     public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    public function provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'provider_id');
    }


}
