<?php

namespace App\Livewire;

use App\Models\Feedback;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Slider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {

        $scategories = ServiceCategory::inRandomOrder()->take(18)->get();
        $fservices = Service::where('featured',1)->inRandomOrder()->take(8)->get();
        $fscategories = ServiceCategory::where('featured',1)->take(8)->get();
        $sid = Service::whereIn('slug', ['ac', 'tv', 'refrigerator', 'geyser', 'water-purifier'])->get()->pluck('id');
        $aservices = Service::whereIn('service_category_id', $sid)->inRandomOrder()->take(8)->get();
        $feedbacks = Feedback::take(5)->get();
        $slides = Slider::where('status',1)->get();
        return view('livewire.home-component', ['slides' => $slides,'feedbacks' => $feedbacks, 'scategories' => $scategories, 'fservices' => $fservices, 'fscategories' => $fscategories, 'aservices' => $aservices])->layout('layouts.base');
    }
}
