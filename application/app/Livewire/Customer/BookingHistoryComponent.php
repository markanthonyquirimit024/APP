<?php

namespace App\Livewire\Customer;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingHistoryComponent extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            session()->flash('message', 'Booking not found.');
            return redirect()->back();
        }
        $booking->booking_status = "Cancelled Booking";
        $booking->save();

        session()->flash('message', 'Booking has been successfully cancelled .');
        return redirect()->back();
    }


    
    public function render()
    {
        $bookings = Booking::orderBy('id', 'desc')->paginate(10);
        return view('livewire.customer.booking-history-component', ['bookings' => $bookings])->layout('layouts.base');
    }
}
