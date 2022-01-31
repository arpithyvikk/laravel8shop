<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class AdminHomeSliderComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public function deleteSlider($id)
    {
        $slider = HomeSlider::find($id);
        File::delete(public_path('assets/images/sliders/'.$slider->image));
        $slider->delete();
        Session()->flash('message', 'Slider has been removed successfully!');

    }

    public function render()
    {
        $sliders = HomeSlider::paginate(10);
        return view('livewire.admin.admin-home-slider-component', ['sliders'=>$sliders])->layout('layouts.base');;
    }
}
