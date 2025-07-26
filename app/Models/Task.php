<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Task extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'booking_id',
//         'provider_id',
//         'service_id',
//         'scheduled_time',
//         'completed_time',
//         'status',
//         'remarks',
//     ];

//     // Relationships
//     public function booking()
//     {
//         return $this->belongsTo(Booking::class);
//     }

//     public function provider()
//     {
//         return $this->belongsTo(related: ServiceProvider::class, 'provider_id');
//     }

//     public function service()
//     {
//         // return $this->belongsTo(Provider::class);
//         return $this->belongsTo(ServiceProvider::class);

//     }

    
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'provider_id', 
        'scheduled_time',
        'completed_time',
        'status',
        'remarks'
    ];

    protected $casts = [
        'scheduled_time' => 'datetime',
        'completed_time' => 'datetime',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'provider_id');
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'provider_id');
    }
}