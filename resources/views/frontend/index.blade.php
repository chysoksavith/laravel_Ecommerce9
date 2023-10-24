@extends('layouts.app')
@section('title', 'Home page')
@section('content')

    <div class="container-banner fade-in-bck ">
        @forelse ($slider as $items_banner)
            <div class="class_banner ">
                <img src="{{ asset("$items_banner->image") }}" alt="bannner">
            </div>
            <div class="title_banner ">
                <div class="divTitle slide-in-blurred-left">
                    <span class="name_banner">{{ $items_banner->title }}</span>
                    <span class="desc_banner">{{ $items_banner->description }}</span>
                    <a href="" class=" text-decoration-none btna btn1">FIND A RETAILER</a>
                </div>
            </div>
        @empty
            <div class="class_banner">
                <div class=" d-flex justify-content-center align-items-center">
                    <span>No items Arrivals</span>
                </div>

            </div>
        @endforelse
    </div>
    {{-- product --}}
    @include('frontend.product')

@endsection
