<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status', '0')->get();
        return view('Frontend.index', compact('slider'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collection.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {

            return view('frontend.collection.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productDisplay(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collection.products.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
