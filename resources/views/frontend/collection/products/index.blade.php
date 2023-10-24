@extends('layouts.app')
@section('title')
    {{ $category->name }}
@endsection
@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection
@section('meta_description')
    {{ $category->meta_description }}
@endsection
@section('content')
    <livewire:frontend.product.index :category="$category"   />
@endsection
