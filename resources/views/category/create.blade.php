@extends('layouts.theme')

@section('content')

    <div class="row m-0 p-0">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">Create Category</div>

                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <p>{{ Session::get('message') }}</p>
                    @endif
                    <div class="">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="">
                                <label for="name">Category</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Add a category name">
                                @error('name')
                                <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <label for="details">Category Details</label>
                                <textarea name="details" class="form-control @error('details') is-invalid @enderror" id="details" cols="30" rows="10" placeholder="About Category"></textarea>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="card-title">Created Category list</div>
                </div>
                <div class="card-body">
                    @if(count($categories) > 0)
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="text-decoration-none">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" >
                                           Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                    <div class="d-flex justify-content-center">
                        No category Created
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
