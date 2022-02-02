<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $newimage;
    public $status;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider = HomeSlider::find($slider_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'required',
            'link' => 'required',
            'status' => 'required'
        ]);
    }
    
    public function editSlider()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'required',
            'link' => 'required',
            'status' => 'required'
        ]);

        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title; 
        $slider->subtitle = $this->subtitle; 
        $slider->price = $this->price; 
        $slider->link = $this->link; 
        if($this->newimage)
        {
            File::delete(public_path('assets/images/sliders/'.$slider->image));
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('sliders',$imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status; 
        $slider->save();
        Session()->flash('message', 'Slider has been updated successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');;
    }
}
