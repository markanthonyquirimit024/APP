<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use  Livewire\WithFileUploads;

class EditCustomerProfileComponent extends Component
{

    use WithFileUploads;
    public $customer_id;
    public $name;
    public $email;
    public $phone;

    

    public function mount()
    {
        $customer = Customer::where('customer_id', Auth::user()->id)->first();
        $this->customer_id = $customer->id;
        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
    }

    public function updateProfile()
    {
        $customer = Customer::where('customer_id', Auth::user()->id)->first();
        $customer->name = $this->name;
        $customer->email = $this->email;
        $customer->phone = $this->phone;
        $customer->save();
        session()->flash('message', 'Profile has been successfully updated!');
    }

    public function render()
    {
        return view('livewire.customer.edit-customer-profile-component')->layout('layouts.base');
    }

    
}
