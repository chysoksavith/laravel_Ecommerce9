<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::orderBy('id', 'desc')->paginate(15);
        return view('admin/slider/index', compact('slider'));
    }
    // show create
    public function create()
    {
        return view('admin/slider/create');
    }
    // store
    public function store(SliderFormRequest  $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'image' => $validatedData['image'],
        ]);
        return redirect('admin/slider')->with('message', 'slider added Successfully');
    }
    // show edit
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }
    // update
    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {

            $destination = $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = 'uploads/slider/' . $filename;
        }

        if (isset($validatedData['image'])) {
            Slider::where('id', $slider->id)->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'status' => $request->status == true ? '1' : '0',
                'image' => $validatedData['image'],
            ]);
        } else {
            Slider::where('id', $slider->id)->update([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'status' => $request->status == true ? '1' : '0',
            ]);
        }
        return redirect('admin/slider')->with('message', 'Sucessfully updated the slider');
    }

    public function destroy(Slider $slider)
    {

        if ($slider->count() > 0) {
            $destination = $slider->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $slider->delete();
            return redirect('admin/slider')->with('message', 'Sucessfully deleted the slider');
        }
        return redirect('admin/slider')->with('message', 'Something went wrong!');

    }
}
