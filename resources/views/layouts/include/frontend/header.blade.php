<div class="header_link">
    <div>
        <nav>
            <ul class="NavLink_Header menu-items NavLink_moba_res">
                <li>
                    <a class="menu-item" href="">Shop</a>
                    <div class="mega-menu">
                        <div class="content">
                            <div class="col">
                                <section>
                                    <h2>feature</h2>
                                    <ul class="mega-links">
                                        <li><a href="">ff</a></li>
                                    </ul>
                                </section>
                            </div>
                            {{-- img --}}
                            <div class="col">
                                <section>
                                    <h2>Feature 1</h2>
                                    <a href="" class="img-wrapper">
                                        <span class="img"> <img src=""alt=""> </span>
                                    </a>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </section>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="{{ url('/collection') }}">All Products</a></li>
                <li><a href="">Aquarium</a></li>
                <li><a href="">Plants</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">where to buy</a></li>
            </ul>
            {{-- menu mobile --}}
            <li class="menu_moba" id="menuBtn"><i class="fa-solid fa-bars"></i></li>
            @include('layouts.include.frontend.asidemenu')
        </nav>
    </div>
    <div class="imgHeader">
        <a href="{{ url('/') }}"><img src="https://drinkprime.com/cdn/shop/files/Prime-Logo_115x.png?v=1637610173"
                alt=""></a>
    </div>
    <div class="Acc_addCart">
        <ul class="iconCart">
            <li>
                <div class="searchInput">
                    <div class="search-icon">
                        <i class="fas fa-search" id="searchIcon"></i>
                    </div>
                    <div class="mega-menu-search" id="megaMenu">
                        <div class="mega-menu-content-search">
                            <input type="search" placeholder="SEARCH........">
                        </div>
                    </div>
                </div>
            </li>
            {{-- wishList --}}
            <li class="cartCount">
                <a href="{{ url('wishList') }}" class=" text_itemCount">
                    <i class="fa-regular fa-heart"></i>
                    <div class="itemCount">
                        <p>
                            <livewire:frontend.wish-list-count />
                        </p>
                    </div>
                </a>
            </li>
            {{-- cart --}}
            <li class="cartCount">
                <a href="{{url('cart')}}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="itemCount">
                        <livewire:frontend.cart.cart-count />
                    </span>
                </a>
            </li>
            @guest
                @if (Route::has('login'))
                    <li class="Icon_disNone "><a class="NavLogin" href="{{ route('login') }}"> <i
                                class="fa-regular fa-user"></i> </a></li>
                @endif
            @else
                <li class="nav-item dropdown mobaDropdown">
                    <a id="navbarDropdown" class="nav-links dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul> {{-- menu mobile --}}
    </div>

</div>
