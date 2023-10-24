@extends('layouts.admin')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h4>Add Category
                    <a href="{{ url('admin/product') }}" class="btn float-end btn-outline-primary">Back Category</a>
                </h4>
            </div>
            <div class="card-body">
               @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error )
                            <div>{{$error}}</div>
                        @endforeach
                    </div>

               @endif
                <form action="{{ url('admin/product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Home
                        </button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="septags-tab" data-bs-toggle="tab" data-bs-target="#septags" type="button" role="tab" aria-controls="septags" aria-selected="false">
                            SEO Tags
                        </button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">
                                Detail
                        </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">
                                Image
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color" type="button" role="tab" aria-controls="color" aria-selected="false">
                                Color
                            </button>
                        </li>
                    </ul>


                  {{-- ---------------------- --}}
                    <div class="tab-content" id="myTabContent">
                        {{-- -------------Home--------- --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-3 mt-4">
                                <label class="mb-3">Category</label>
                                <select class="form-select" name="category_id">
                                    <option value="selected">selected</option>

                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-3">Product Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="mb-3">Product Slug</label>
                                <input type="text" class="form-control" name="slug">
                            </div>
                            <div class="mb-3 mt-4">
                                <label class="mb-3">Select Brand</label>
                                <select class="form-select" name="brand">
                                    <option value="selected">selected</option>

                                    @foreach ($brands as $item)
                                        <option value="{{ $item->name }}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-3">Product small_description</label>
                                <textarea name="small_description" class="form-control"  rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-3">Product description</label>
                                <textarea name="description" class="form-control"  rows="3"></textarea>
                            </div>
                        </div>
                        {{-- ---------------seoTag--------------- --}}
                        <div class="tab-pane fade" id="septags" role="tabpanel" aria-labelledby="septags-tab">
                            <div class="col-md-12 mb-3 mt-4">
                                <label>meta_title</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>meta_keyword</label>
                                <input type="text" name="meta_keyword" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>meta_description</label>
                                <textarea name="meta_description" class="form-control"  rows="3"></textarea>
                            </div>
                        </div>
                        {{-- -----------------Detail------------- --}}
                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="col-md-12 mb-3 mt-4">
                                <label>original_price</label>
                                <input type="number" name="original_price" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>selling_price</label>
                                <input type="number" name="selling_price" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3 mt-4">
                                <label>quantity</label>
                                <input type="number" name="quantity" class="form-control">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label> Trending Status </label>
                                <input type="checkbox" class="m-3" name="trending" style="width:20px;height:20px;" > <small class="text-danger">checked=Trending, Un checked=Visible</small>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label>  Status </label>
                                <input type="checkbox" class="m-3" name="status" style="width:20px;height:20px;" > <small class="text-danger">checked=Trending, Un checked=Visible</small>
                            </div>
                        </div>

                        {{-- -----------------IMAGE------------- --}}
                        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">

                            <div class="mb-3 mt-3">
                                <label>Uploade Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>

                        </div>
                         {{-- -----------------Color------------- --}}
                         <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab">

                           <div class="mb-3">
                                <label>Select Color</label>
                                <div class="row">
                                    <div class="boxColor">
                                        @forelse ($color as $colorItem )
                                            <div class="boxColorCode">
                                                <span>Color :</span>
                                                <input type="checkbox" class="form-check-input" name="colors[{{ $colorItem->id }}]" value="{{ $colorItem->id }}">
                                                <span>{{ $colorItem->name }}</span>
                                                <span>Quantity :</span>
                                                <input type="number" name="colorquantity[{{ $colorItem->id }}]" class="form-control">
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h1>No Color Added</h1>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                           </div>

                        </div>

                    </div>

                  <div>
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                  </div>

                </form>
               </div>
        </div>
    </div>

@endsection
