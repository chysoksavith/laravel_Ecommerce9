<div>
    <div class="titlewis text-center" style="margin-top: 150px">
        <span style="font-size: 32px; font-weight: 600; letter-spacing:3px;">Shopping WishList</span>
    </div>
    <div class="wishl">

        <table class="tableWish">

            <thead>
                <tr class="thead_list">
                    <th class="th1">Item</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($wishlist as $wishlistItem)
                    @if ($wishlistItem->product)
                        <tr class="trbody">
                            <td class="td1 d-flex align-items-center ">
                                <a
                                    href="{{ url('collection/' . $wishlistItem->product->category->slug . '/' . $wishlistItem->product->slug) }}">
                                    <img src="{{ $wishlistItem->product->productImage[0]->image }}" alt="">
                                </a>
                                <span>{{ $wishlistItem->product->name }}</span>
                            </td>
                            <td><span>{{ $wishlistItem->product->selling_price }} <span
                                        style="color: red;">$</span></span></td>
                            <td class=" text-center ">
                                <span type="button" wire:click="removeWishListItem({{ $wishlistItem->id }})">
                                    <span wire:loading.remove wire:target="removeWishListItem({{ $wishlistItem->id }})">
                                        <i class="fa-solid fa-x "></i>
                                    </span>
                                    <span wire:loading wire:target="removeWishListItem({{ $wishlistItem->id }})">
                                        Loading....
                                    </span>
                                </span>
                            </td>
                        </tr>
                    @endif

                @empty
                    <td colspan="3">No item added</td>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
