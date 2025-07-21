<?php
// app/Models/ServiceProvider.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // <-- ADD THIS LINE
        'name',
        'email',
        'phone',
        'specialization',
        'bio',
    ];

    // Your existing bookingDetails function is perfect. Let's rename it to 'tasks' for clarity.
    public function tasks()
    {
        return $this->hasMany(BookingDetail::class, 'provider_id');
    }

    // Optional: Add the reverse relationship back to the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}