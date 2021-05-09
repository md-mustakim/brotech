@extends('layouts.theme')

@section('content')

    <div class="row m-0 p-0">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">Add Product</div>

                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <p>{{ Session::get('message') }}</p>
                    @endif
                    <div class="">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <label for="category_id">Category*</label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <label for="name">Product Title*</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Add a category name">
                                @error('name')
                                <p class="font-weight-bold h5 text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="">
                                <label for="details">Products Details*</label>
                                <textarea name="details" class="form-control @error('details') is-invalid @enderror" id="details" cols="30" rows="10" placeholder="About Category"></textarea>
                                @error('details')
                                <p class="font-weight-bold h5 text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="">
                                <label for="price">Product price*</label>
                                <input type="number"
                                       class="form-control @error('price') is-invalid @enderror"
                                       name="price" id="price" placeholder="Add price">
                                @error('price')
                                <p class="font-weight-bold h5 text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="">
                                <label for="stock">Product stock*</label>
                                <input type="number"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="stock" id="stock"
                                       placeholder="Add stock">
                                @error('stock')
                                <p class="font-weight-bold h5 text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="">
                                <label for="image">Product Image</label>
                                <input type="file" name="image" id="name" class="form-control-file">
                                @error('image')
                                <p class="font-weight-bold h5 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center py-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        </div>
    </div>
@endsection
