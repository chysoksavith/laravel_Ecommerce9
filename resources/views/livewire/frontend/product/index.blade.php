<div>
    <div class="container_prod">
        <div class="filter_side">
            <div class="title_cateAAA">
                <p>Filter</p>
            </div>
            @if ($category->brands)
                <div class="filter_menu">
                    <div class="title_fil">
                        <span>Brands</span>
                    </div>

                    <ul class="filtUl">
                        @foreach ($category->brands as $item)
                            <li class="li_chec">
                                <input type="checkbox" wire:model="brandInput"
                                    value="{{ $item->name }}"><span>{{ $item->name }}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>
            @endif
            <div class="filter_menu">
                <div class="title_fil">
                    <span>Prices</span>
                </div>

                <ul class="filtUl">
                    @foreach ($category->brands as $item)
                        <li class="li_chec">
                            <input type="radio" name="priceSort" wire:model="PriceInput"
                                value="High-to-Low"><span>High to Low</span>
                        </li>
                        <li class="li_chec">
                            <input type="radio" name="priceSort" wire:model="PriceInput"
                                value="low-to-hight"><span>Low to Hight</span>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="prod_side">
            <div class="prod-side-cate">
                {{-- title --}}
                <div class="title_cateAAA">
                    <p>Name</p>
                    <div class=" header_cate">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <span style="color:#b3b3b3;">/</span>
                            <li><a href="{{ url('') }}">Co2</a></li>
                        </ul>
                    </div>
                </div>

                <div class="product_items_cate slide-in-blurred-left">
                    @forelse ($product as $itemPro)
                        <a href="{{ url('/collection/' . $itemPro->category->slug . '/' . $itemPro->slug) }}"
                            class="ALinkPro">
                            <div class="header_prod">
                                <div class="imgProd">
                                    @if ($itemPro->productImage->count() > 0)
                                        <img src="{{ asset($itemPro->productImage[0]->image) }}"
                                            alt="{{ $itemPro->name }}">
                                    @endif

                                    <div class="OutOfStock"><span>Out Of stock</span></div>
                                </div>
                                {{-- price and title --}}
                                <div class="bodyProd">
                                    <span class="ProTitle">{{ $itemPro->brand }}</span>
                                    <span class="ProdDes">{{ $itemPro->small_description }}</span>
                                    <span class="ProPrice">{{ $itemPro->selling_price }} $</span>
                                </div>
                                <div class="btnCart">
                                    <button class="btnCartMain ">Add to cart</button>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="div">
                            <span>No Product Available for {{ $category->name }}</span>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>

    </div>
</div>
