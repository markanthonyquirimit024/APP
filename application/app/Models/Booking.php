<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'phone', 
    'date', 'time', 'service_id', 'service_title', 
    'quantity', 'price', 'image', 'booking_status'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
