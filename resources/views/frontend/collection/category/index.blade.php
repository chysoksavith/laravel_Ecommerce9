@extends('layouts.app')
@section('title', 'All Products')
@section('content')
    <div class="Main_Cate">
        <span>Our <span class="styCate">Categories</span></span>
    </div>
    <div class="Prod_cate">
        @forelse ($categories as $categoryItem)
            <a href="{{ url('/collection/'.$categoryItem->slug) }}">
                <div class="Cate_items slide-in-blurred-left">
                    <div class="imgCate">
                        <img src="{{ asset("$categoryItem->image") }}" alt="">
                    </div>
                    <div class="Title_Cate">
                        <span>{{$categoryItem->name}}</span>
                    </div>
                </div>
            </a>
        @empty
        @endforelse


    </div>

@endsection
