@extends('layouts.theme')
@section('content')
    <div class="">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="card-title">Create Category</div>

            </div>
            <div class="card-body">
                @if(Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <div class="">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <label for="name">Category</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ $category->name }}"
                                   id="name"
                                   placeholder="Add a category name">
                            @error('name')
                            <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="details">Category Details</label>
                            <textarea name="details"
                                      class="form-control @error('details') is-invalid @enderror"
                                      id="details" cols="30"
                                      rows="10"
                                      placeholder="About Category">$category->details</textarea>
                            @error('details')
                            <p class="">{{ $message }}</p>
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
@endsection
