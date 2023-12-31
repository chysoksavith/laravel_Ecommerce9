<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){

        $color = Color::orderBy('id', 'desc')->paginate(15);
        return view('admin.color.index', compact('color'));
    }

    public function create(){
        return view('admin.color.create');
    }

    public function store(ColorFormRequest $request){
        $validateData = $request->validated();
        $validateData['status'] = $request->status == true ? '1' : '0';
        Color::create($validateData);

        return redirect('admin/colors')->with('message' , 'Color Added Successfully');
    }

    public function edit(Color $color){
        return view('admin.color.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, int $color_id){

        $validateData = $request->validated();
        $validateData['status'] = $request->status == true ? '1' : '0';
        Color::find($color_id)->update($validateData);

        return redirect('admin/colors')->with('message' , 'Color Updated Successfully');
    }

    public function destroy($color_id){
        $color = Color::findOrFail($color_id);

        $color->delete();
        return redirect('admin/colors')->with('message' , 'Color Deleted Successfully');

    }
}
