@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="card-title">
                    <span>Product List </span>
                    <div class="">
                        <a href="{{route('product.create')}}"> Create Product </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(count($products) >0)
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Details</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->details }}</td>
                                <td>
                                    <a href="{{route('product.edit', $product->id)}}" class="">Edit</a>
                                </td>
                                <td>
                                    <form class="" action="{{route('product.destroy', $product->id)}}" method="post" id="deleteProduct">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="d-flex justify-content-center">
                        <p>No Product found</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        function deleteItem() {
            if (confirm('Are you Sure?')){
                document.getElementById('deleteProduct').submit();
            }
        }
    </script>
@endpush
