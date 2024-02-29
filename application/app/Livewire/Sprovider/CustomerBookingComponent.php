<?php

namespace App\Livewire\Sprovider;

use App\Models\Booking;
use Livewire\Component;

class CustomerBookingComponent extends Component
{
    public function render()
    {
        $bookings = Booking::paginate(10);
        return view('livewire.sprovider.customer-booking-component', ['bookings' => $bookings])->layout('layouts.base');
    }
}
