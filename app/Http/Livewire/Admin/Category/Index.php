<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id){

        $this->category_id = $category_id;

    }
    public function desctroyCategory(){
       $category = Category::find($this->category_id);
       $path = 'uploads/category/'.$category->image;
       if(File::exists($path)){
         File::delete($path);
       }
       $category->delete();
       session()->flash('message' , 'Category Deleted');
       $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $category = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['category' => $category] );
    }
}
