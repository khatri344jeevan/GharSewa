<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'role', 'phone', 'address', 'password'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    // THIS IS THE RELATIONSHIP FOR THE SERVICE PROVIDER DASHBOARD
    public function serviceProviderProfile(): HasOne
    {
        return $this->hasOne(ServiceProvider::class);
    }
    
    // THESE ARE YOUR TEAM'S OTHER RELATIONSHIPS - THEY MUST EXIST
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}