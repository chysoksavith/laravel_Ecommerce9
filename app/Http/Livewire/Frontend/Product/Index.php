<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $product, $category, $brandInput = [], $PriceInput;
    protected $queryString = [
        'brandInput' => ['except' => '', 'as' => 'brand'],
        'PriceInput' => ['except' => '', 'as' => 'price'],
    ];
    public function mount($category)
    {
        $this->category = $category;
    }
    public function render()
    {
        $this->product = Product::where('category_id', $this->category->id)
            ->when($this->brandInput, function ($q) {
                $q->whereIn('brand', $this->brandInput);
            })
            ->when($this->PriceInput, function ($q) {
                $q->when($this->PriceInput == 'High-to-Low', function ($q2) {
                    $q2->orderBy('selling_price', 'DESC');
                })
                ->when($this->PriceInput == 'High-to-Low', function ($q2) {
                    $q2->orderBy('selling_price', 'ASC');
                });
            })
            ->where('status', '0')->get();

        return view('livewire.frontend.product.index', [
            'product' => $this->product,
            'category' => $this->category
        ]);
    }
}
