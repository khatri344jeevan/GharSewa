<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialization',
        'bio',
        'user_id',       
    ];

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class, 'provider_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
