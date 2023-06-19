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
                    <tr>
                        <td>1</td>
                        <td><img src="{{ asset('storage/images/products/p-01.jpg') }}" alt="" width="75"></td>
                        <td>Pear</td>
                        <td>123.00đ  <del>321.00đ</del></td>
                        <td><input type="date" value="2023-06-19" disabled class="form-control"></td>
                        <td>10kg</td>
                        <td>Fruit</td>
                        <td>
                            <form action="" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                                <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.product.edit') }}"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection