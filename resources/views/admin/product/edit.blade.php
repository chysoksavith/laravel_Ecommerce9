@extends('layouts.admin')
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category
                    <a href="{{ url('admin/product') }}" class="btn float-end btn-outline-primary">Back Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <h4 class="alert alert-warning">{{ session('message') }}</h4>
                @endif
               @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error )
                            <div>{{$error}}</div>
                        @endforeach
                    </div>

               @endif
                <form action="{{ url('admin/product/' .$product->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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



                    <div class="tab-content" id="myTabContent">
                        {{-- -------------Home--------- --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-3 mt-4">
                                <label class="mb-3">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-3">Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="mb-3">Product Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                            </div>
                            <div class="mb-3 mt-4">
                                <label class="mb-3">Select Brand</label>
                                <select class="form-select" name="brand">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}"  {{ $brand->name ==  $product->brand ? 'selected' : '' }}>
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-3">Product small_description</label>
                                <textarea name="small_description" class="form-control"  rows="3">{{ $product->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-3">Product description</label>
                                <textarea name="description" class="form-control"  rows="3">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        {{-- --------------Seotag---------------- --}}
                        <div class="tab-pane fade" id="septags" role="tabpanel" aria-labelledby="septags-tab">
                            <div class="col-md-12 mb-3 mt-4">
                                <label>meta_title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>meta_keyword</label>
                                <input type="text" name="meta_keyword" class="form-control" value="{{ $product->meta_keyword }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>meta_description</label>
                                <textarea name="meta_description" class="form-control"  rows="3">{{ $product->meta_description }}</textarea>
                            </div>
                        </div>
                        {{-- --------------detail price ---------------- --}}
                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="col-md-12 mb-3 mt-4">
                                <label>original_price</label>
                                <input type="number" name="original_price" class="form-control" value="{{ $product->original_price }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>selling_price</label>
                                <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                            </div>

                            <div class="col-md-12 mb-3 mt-4">
                                <label>quantity</label>
                                <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label> Trending Status </label>
                                <input type="checkbox" class="m-3" name="trending" style="width:20px;height:20px;" {{ $product->trending == '1' ? 'checked' : '' }} > <small class="text-danger">checked=Trending, Un checked=Visible</small>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label>  Status </label>
                                <input type="checkbox" class="m-3" name="status" style="width:20px;height:20px;"{{ $product->status == '1' ? 'checked' : '' }}  > <small class="text-danger">checked=Trending, Un checked=Visible</small>
                            </div>
                        </div>
                        {{-- -----------------image------------- --}}
                        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">

                            <div class="mb-3 mt-3">
                                <label>Uploade Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                @if ($product->productImage)
                                    <div class="row">
                                        @foreach (  $product->productImage as $images )
                                            <div class="col-md-2 ">
                                                <img src="{{ asset($images->image) }}" width="80px" height="80px" class="me-4 border"  alt="ing">
                                                <a href="{{ url('admin/product-image/'.$images->id.'/delete') }}" class=" btn btn-sm btn-outline-danger mt-2 m-auto"> Remove </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <h4>No image</h4>
                                @endif

                            </div>
                        </div>
                         {{-- -----------------Color------------- --}}
                         <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab">
                            <div class="mb-3">
                                <h4>Add Product Color</h4>
                                <label>Select Color</label>
                                <div class="row">
                                    <div class="boxColor">
                                        @forelse ($colors as $colorItem )
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

                                <div class="table-responsive">
                                    <table class="table-bordered table table-striped table-sm mt-4 align-middle">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColor as $itemColor )
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($itemColor->color)
                                                            {{ $itemColor->color->name}}
                                                        @else
                                                        <small class="text-danger">No color</small>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <div class="input-group mb-3" style="width: 150px">
                                                            <input type="number" value="{{ $itemColor->quantity }}" class="productColorQuantity form-control form-control-sm">
                                                            <button type="button" value="{{ $itemColor->id }}" class="btn btn-sm btn-outline-dark updateProductColorBtn">Update</button>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <button type="button" value="{{ $itemColor->id }}" class="btn btn-sm btn-outline-danger deleteProductColorBtn">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                           </div>
                            </div>
                        </div>

                    </div>

                  <div>
                    <button type="submit" class="btn btn-primary float-end">Update</button>
                  </div>

                </form>
               </div>
        </div>
    </div>

@endsection
{{--  --}}
@section('script')

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.updateProductColorBtn' , function(){

            var product_id = "{{ $product->id  }}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();

            // alert(prod_color_id)

            if(qty <= 0){

                alert('qty required ')
                return false;
            }

            var data ={
                'product_id': product_id,
                'qty': qty
            };

            $.ajax({
                type: "POST",
                url: "/admin/product-color/"+prod_color_id,
                data: data,
                success: function(response){
                    alert(response.message);
                }
            })
        });
        // delete
        $(document).on('click', '.deleteProductColorBtn' , function(){
            var prod_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type: "GET",
                url: "/admin/product-color/"+prod_color_id+"/delete",
                success: function(response){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message);
                }
            });
        });
    });
</script>

@endsection
