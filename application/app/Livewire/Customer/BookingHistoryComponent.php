<?php

namespace App\Livewire\Customer;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingHistoryComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $bookings = Booking::paginate(10);
        return view('livewire.customer.booking-history-component', ['bookings' => $bookings])->layout('layouts.base');
    }
}
