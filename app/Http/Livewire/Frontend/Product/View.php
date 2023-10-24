<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1, $productColorId;
    public function addToWishList($productId)
    {
        // auth::check mean if user login or not
        if (Auth::check()) {

            if (WishList::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type' => 'success',
                    'status' => 409
                ]);
                return false;
            } else {
                WishList::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdate');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist added successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor =  $this->product->productColor()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'outOfStock';
        }
    }
    // incremeant decre
    public function decrementQty()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }
    public function incrementQty()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }
    public function addToCart(int $prodId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $prodId)->where('status', '0')->exists()) {

                // check for color product qty and insert to cart
                if ($this->product->productColor()->count() > 1) {
                    // dd("im color");
                    if ($this->productColorSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $prodId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Added',
                                'type' => 'warning',
                                'status' => 200
                            ]);
                        } else {


                            $productColor = $this->product->productColor()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity > $this->quantityCount) {
                                    //insert product to cart

                                    // dd("im cart prod  color");

                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $prodId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('CartAddedUpdate');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product added to carts success',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->quantity . ' Quantity Available',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Color out of Stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Product Color',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $prodId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Added',
                            'type' => 'success',
                            'status' => 200
                        ]);
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity > $this->quantityCount) {
                                //insert product to cart
                                // dd("im prod no color");
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $prodId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('CartAddedUpdate');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product added to carts success',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->quantity . ' Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out Of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does not exists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please  Login First Before You Can Added',
                'type' => 'success',
                'status' => 409
            ]);
        }
    }
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
