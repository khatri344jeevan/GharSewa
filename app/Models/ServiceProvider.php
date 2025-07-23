<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\ServiceProvider;
class ServiceProvider extends Model
{
    use HasFactory;
    
    // Add user_id here to make the link work
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'specialization', 'bio'];

    // This is the correct relationship to your team's `booking_details` table
    public function tasks()
    {
        // A ServiceProvider has many tasks through the BookingDetail model
        // The foreign key on the booking_details table is 'provider_id'
        return $this->hasMany(BookingDetail::class, 'service_provider_id');
    }

    // Link back to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}