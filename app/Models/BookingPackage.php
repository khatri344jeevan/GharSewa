<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingPackage extends Model
{
    use HasFactory;

    // Explicitly define the table name (since it's not plural)
    protected $table = 'booking_package';

    protected $fillable = [
        'booking_id',
        'package_id',
        'start_date',
        'end_date',
        'price',
    ];

    // Relationships
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
