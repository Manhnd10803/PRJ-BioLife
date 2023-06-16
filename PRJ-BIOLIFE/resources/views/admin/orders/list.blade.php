@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">LIST ORDER</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Quản trị đơn hàng.</li>
    </ol>
    {{-- <div class="row">
        
    </div> --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Order
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
                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                            <a class="btn btn-link text-dark px-3 mb-0" href="/formEditCategoryjavascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            
                        </td>
                    </tr>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection