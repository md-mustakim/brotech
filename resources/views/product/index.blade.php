@extends('layouts.theme')

@section('content')
    <div class="card">
        <div class="card-body">
            @if(count($products) >0)
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Details</th>
                        <th>Action</th>
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
                                <p onclick="deleteItem()">
                                   <i class="fa fa-trash"> </i>
                               </p>
                                <form class="d-none" action="{{route('product.destroy', $product->id)}}" method="post" id="deleteProduct">
                                    @csrf
                                    @method('DELETE')
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
