@extends('layouts.admin')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    @if(session('message'))
    <div class="alert alert-primary" role="alert">
        {{session('message')}}
      </div>
    @endif
    <div class="container-xl">

    </div>
</div>
@endsection
