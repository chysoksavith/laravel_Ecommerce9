<?php

namespace App\Http\Livewire\Frontend;

use App\Models\WishList;
use Livewire\Component;

class WishLishShow extends Component
{
    public function removeWishListItem(int $wishlistId){
        WishList::where('user_id' , auth()->user()->id)->where('id', $wishlistId)->delete();
        $this->emit('wishlistAddedUpdate');
        $this->dispatchBrowserEvent('message', [
            'text' => 'WishList item remove',
            'type' => 'success',
            'status' => 409
        ]);
        return false;
    }
    public function render()
    {
        $wishlist = WishList::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wish-lish-show', [
            'wishlist' => $wishlist
        ]);
    }
}
