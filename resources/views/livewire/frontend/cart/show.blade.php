<div>
    <div class="main-cart-warp">
        <div class="title-cart">
            <span class="title-cartShow">
                <p>Shopping Cart</p>
            </span>
            <span class="righ-title-cartShow">
                <button class="btnCartMain-show">
                    Proceed to Checkout
                </button>
            </span>
        </div>
        <div class="cart-warpper">
            <div class="left-cart-warp">
                <table class="table align-middle ">
                    <thead class="bg-light">
                        <tr>
                            <th>Item</th>
                            <th> Price</th>
                            <th>Qty</th>
                            <th>Total Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart as $cartItem)
                            @if ($cartItem->product)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a
                                                href="{{ url('collection/' . $cartItem->product->category->slug . '/' . $cartItem->product->slug) }}">
                                                @if ($cartItem->product->productImage)
                                                    <img src="{{ asset($cartItem->product->productImage[0]->image) }}"
                                                        alt="" style="width: 100px; height: 100px" />
                                                @else
                                                    <img src="https://static.vecteezy.com/system/resources/thumbnails/004/141/669/small/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg"
                                                        alt="" style="width: 100px; height: 100px" />
                                                @endif

                                            </a>
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $cartItem->product->name }}</p>
                                                @if ($cartItem->productColor)
                                                    @if ($cartItem->productColor->Color)
                                                        <p class="fw-bold mb-1">with Color :
                                                            {{ $cartItem->productColor->Color->name }}</p>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $cartItem->product->selling_price }} $</p>
                                    </td>
                                    <td>
                                        <div class="countInputCartShow">
                                            <div class="Decre"><button class="d-c" wire:loading.attr="disabled"
                                                    wire:click="decrementQuantity({{ $cartItem->id }})">-</button>
                                            </div>
                                            <div class="Num"> <input type="text" class="qty"
                                                    value="{{ $cartItem->quantity }}" readonly> </div>
                                            <div class="Decre"><button class="i-c" wire:loading.attr="disabled"
                                                    wire:click="incrementQuantity({{ $cartItem->id }})">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- total price --}}
                                    <td>
                                        <p class="fw-normal mb-1">
                                            {{ $cartItem->product->selling_price * $cartItem->quantity }} $
                                        </p>
                                        @php
                                            $totalPrice +=  $cartItem->product->selling_price * $cartItem->quantity
                                        @endphp
                                    </td>
                                    <td>
                                        <span wire:loading.attr="disabled" class=" cursor-pointer"
                                            wire:click="removeCartItem({{ $cartItem->id }})">
                                            <span  wire:loading.remove
                                                wire:target="removeCartItem({{ $cartItem->id }})">X</span>
                                            <span wire:loading wire:target="removeCartItem({{ $cartItem->id }})">
                                                <div class="spinner-border" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </span>

                                        </span>
                                    </td>
                                </tr>
                            @endif

                        @empty
                            <tr>
                                <td colspan="4">No item </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="cartTotal">
                    <p class="TotPric">Total : <span>{{ $totalPrice }}$</span></p>
                </div>
            </div>
            <div class="right-cart-warp">
                b
            </div>
        </div>
    </div>

</div>
