@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div>
                <i class="fas fa-table me-1"></i>
                DataTable Product
            </div>
            <a href="{{ route('admin.product.add') }}" class="btn btn-link text-success px-3 mb-0"><i class="material-icons text-sm me-2">add</i>Add</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Exp</th>
                        <th>Weight</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i =1;
                    @endphp
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $i }}</td>
                        <td><img src="{{ asset('storage/'.$product->srcImage) }}" alt="" width="75"></td>
                        <td>{{ $product->nameProduct }}</td>
                        <td>{{ $product->priceSaleProduct }}$  <del>{{ $product->priceProduct }}$</del></td>
                        <td><input type="date" value="{{ $product->expProduct }}" disabled class="form-control"></td>
                        <td>{{ $product->weightProduct }}</td>
                        <td>{{ $product->nameCategory }}</td>
                        <td>
                            <form action="{{ route('admin.product.delete', $product->idProduct) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="return confirm('Are you sure?')"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                                <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.product.edit', $product->idProduct) }}"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            </form>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection