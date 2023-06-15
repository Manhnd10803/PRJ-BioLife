@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">LIST CATEGORY</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Quản trị danh mục sản phẩm.</li>
    </ol>
    {{-- <div class="row">
        
    </div> --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Category
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID Category</th>
                        <th>Name Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>ID Category</th>
                        <th>Name Category</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    <tr>
                        <td>Yuri Berry</td>
                        <td>Chief Marketing Officer (CMO)</td>
                        <td>New York</td>
                        <td>
                            <a href="" class="btn btn-danger">Xóa</a>
                            <a href="/formEditCategory" class="btn btn-primary">Sửa</a>
                        </td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection