<div>
    <div class="main_warpper">
        <div class="detail_div">
            <div class="detail_div_left">
                <div class="img-container">
                    @if ($product->productImage)
                        <img src="{{ asset($product->productImage[0]->image) }}" alt="watch">
                    @else
                        No Image
                    @endif
                </div>
                <div class="hover-container">

                    @forelse ($product->productImage as $itemImg)
                        <div><img src="{{ asset($itemImg->image) }}" onclick="showImg(this.src)"></div>
                    @empty
                    @endforelse
                </div>
            </div>
            {{-- right --}}
            <div class="detail_div_right">
                <div class="coverdetail_tit">
                    <div class="detail_titl">
                        <div class="inStock ">
                            <span class="det_title">{{ $product->name }}</span>

                        </div>
                        <div class="sell_ori_price d-flex gap-5">
                            <span class="det_price">{{ $product->selling_price }} $</span>
                            <span
                                class="det_price text-decoration-line-through text-danger">{{ $product->original_price }}$</span>
                        </div>

                    </div>
                    {{-- color --}}

                    <div class="countColor">

                        @if ($product->productColor->count() > 0)
                        <div class="colorClass">
                            <span>Color</span>
                        </div>
                            @if ($product->productColor)
                                @foreach ($product->productColor as $colorItem)
                                    {{-- <input type="radio" name="colorSelection"
                                        value="{{ $colorItem->id }}">{{ $colorItem->Color->name }} --}}

                                    <label wire:click="colorSelected({{ $colorItem->id }})" class="colorSelectionLabel"
                                        style="background-color:{{ $colorItem->Color->code }}">
                                        {{-- {{ $colorItem->Color->name }} --}}
                                    </label>
                                @endforeach
                            @endif

                            @if ($this->productColorSelectedQuantity == 'outOfStock')
                                <div class="det_title_instock text-danger">
                                    <span class=" text-danger text-decoration-line-through">Out Of Stock</span>
                                </div>
                            @elseif ($this->productColorSelectedQuantity > 0)
                                <div class="det_title_instock ">
                                    <span>Instock</span>
                                </div>
                            @endif
                        @else
                            @if ($product->quantity)
                                <div class="det_title_instock ">
                                    <span>Instock</span>
                                </div>
                            @else
                                <div class="det_title_instock text-danger">
                                    <span class=" text-danger text-decoration-line-through">Out Of Stock</span>
                                </div>
                            @endif

                        @endif

                    </div>
                    <div class="det_desc">
                        <span>
                            {{ $product->description }}
                        </span>
                    </div>

                    {{-- count --}}
                    <div class="countInput">
                        <div class="Decre"><button class="d-c" wire:click="decrementQty">-</button></div>
                        <div class="Num"> <input type="text"  value="{{$this->quantityCount}}" class="qty" wire:model="quantityCount" readonly> </div>
                        <div class="Decre"><button class="i-c" wire:click="incrementQty">+</button></div>

                        {{-- cart --}}
                        <div class="btCartDetail">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="CartBtnDetail">ADD TO CART</button>
                        </div>
                    </div>
                    {{-- wish list --}}
                    <div class="wishList">
                        <i class="fa-regular fa-heart" wire:click="addToWishList({{$product->id}})" ></i>
                        <span wire:loading.remove wire::target="addToWishList">Wish List</span>
                        <span wire:loading wire::target="addToWishList">Loading...</span>
                    </div>
                    {{-- summary or more information --}}
                    <div class="info_samary">
                        <details>
                            <summary>Specifications
                            </summary>
                            <div class="divSumary">
                                <p class="Psummary">hello</p>
                            </div>
                        </details>
                    </div>
                    {{-- line --}}
                    <div class="line">
                        <span class="l-r"></span>
                        <span>More</span>
                        <span class="l-r"></span>

                    </div>
                    {{-- image detail --}}
                    <div class="img_detail">
                        <div class="imgDt1">
                            <img src="{{ asset('image_products/caffein-free_icon_updated.webp') }}" alt="">
                        </div>
                        <div class="imgDt1">
                            <img src="{{ asset('image_products/BCAAs.webp') }}" alt="">
                        </div>
                        <div class="imgDt1">
                            <img src="{{ asset('image_products/Vitamins_3.webp') }}" alt="">
                        </div>
                        <div class="imgDt1">
                            <img src="{{ asset('image_products/Electrolytes_3.webp') }}" alt="">
                        </div>
                        <div class="imgDt1">
                            <img src="{{ asset('image_products/Vitamins_3.webp') }}" alt="">
                        </div>
                    </div>
                    {{-- fine in store --}}
                    <div class="btnFindStore">
                        <a href="" class=" text-decoration-none"><button class="FindStor">FIND IN
                                STORE</button></a>
                    </div>
                </div>

            </div>
        </div>
        {{-- relate product --}}
        <div class="RelateProd">
            <span>Relate Products</span>
        </div>
    </div>

</div>
@section('scripts')
    <script>
        let bigImg = document.querySelector('.img-container img');

        function showImg(pic) {
            bigImg.src = pic;
        }
    </script>
@endsection
