<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    use ImageTrait;
    public function index() {
        $sliders = Slider::all();
        return view('backend.slider', compact('sliders'));
    }

    public function store(SliderRequest $request)
    {
        $image_name = $this->saveImage($request->image,'images/sliders');
        Slider::create([
            'title' => $request->title,
            'image' => $image_name,
            'description' => $request->description,
        ]);
        toastr()->success('Slider Add Successfully');
        return redirect()->route('admin.slider');
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        if($request->hasFile('image') || $request->image != ''){
            unlink("images/sliders/".$slider->image);
            $image_name = $this->saveImage($request->image,'images/sliders');
            $slider->update([
                'title' => $request->title,
                'image' => $image_name,
                'description' => $request->description,
            ]);
        }  
        $slider->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
       
        toastr()->success('Slider Update Successfully');
        return redirect()->route('admin.slider');
    }

    public function destroy( Slider $slider)
    {
        $slider->delete();
        unlink("images/sliders/".$slider->image);
        toastr()->success('Slider Delete Successfully');
        return redirect()->route('admin.slider');
    }
}
