<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProdutImages;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->paginate(15);
        return view('admin.product.index', compact('product'));
    }
    public function create()
    {

        $category = Category::all();
        $brands = Brand::all();
        $color = Color::where('status', '0')->get();
        return view('admin.product.create', compact('category',  'brands', 'color'));
    }

    public function store(ProductFormRequest $request)
    {
        $validateData = $request->validated();

        $category = Category::findOrFail($validateData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validateData['category_id'],
            'name' => $validateData['name'],
            'slug' => Str::slug($validateData['slug']),
            'brand' => $validateData['brand'],

            'small_description' => $validateData['small_description'],
            'description' => $validateData['description'],

            'original_price' => $validateData['original_price'],
            'selling_price' => $validateData['selling_price'],
            'quantity' => $validateData['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',


            'meta_title' => $validateData['meta_title'],
            'meta_keyword' => $validateData['meta_keyword'],
            'meta_description' => $validateData['meta_description']
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $i  = 1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                $product->productImage()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColor()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0
                ]);
            }
        }
        return redirect('/admin/product')->with('message', 'Product added Success');
    }

    public function edit(int $product_id)
    {

        $product = Product::findOrFail($product_id);
        $categories = Category::all();
        $brands = Brand::all();
        $product_color = $product->productColor->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();
        return view('admin.product.edit', compact('categories', 'brands', 'product', 'colors'));
    }


    public function update(ProductFormRequest $request,  int $product_id)
    {
        $validateData = $request->validated();
        $product = Category::findOrFail($validateData['category_id'])->products()->where('id', $product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $validateData['category_id'],
                'name' => $validateData['name'],
                'slug' => Str::slug($validateData['slug']),
                'brand' => $validateData['brand'],

                'small_description' => $validateData['small_description'],
                'description' => $validateData['description'],

                'original_price' => $validateData['original_price'],
                'selling_price' => $validateData['selling_price'],
                'quantity' => $validateData['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',


                'meta_title' => $validateData['meta_title'],
                'meta_keyword' => $validateData['meta_keyword'],
                'meta_description' => $validateData['meta_description']
            ]);

            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';

                $i  = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;

                    $product->productImage()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColor()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
            }
            return redirect('/admin/product')->with('message', 'Product updated Success');
        } else {
            return redirect('admin/product')->with('message', 'No Product Id Found!');
        }
    }

    public function destroyImage(int $product_image_id)
    {
        $productImaage = ProdutImages::findOrFail($product_image_id);

        if (File::exists($productImaage->image)) {
            File::delete($productImaage->image);
        }
        $productImaage->delete();
        return redirect()->back()->with('message', 'product deleted!');
    }

    public function destroy(int $product_id)
    {

        $product = Product::findOrFail($product_id);

        if ($product->productImage()) {
            foreach ($product->productImage() as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();

        return redirect()->back()->with('message', 'product deleted!');
    }


    public function updateProdColorQty(Request $request, $prod_color_id)
    {

        $productColorData = Product::findOrFail($request->product_id)
            ->productColor()->where('id', $prod_color_id)
            ->first();
        $productColorData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Product Color Qty Updated']);
    }

    public function deleteProdColor($prod_color_id)
    {
        $prodColor = ProductColor::findOrFail($prod_color_id);

        $prodColor->delete();
        return response()->json(['message' => 'Product Color Qty Deleted']);
    }
}
