@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div>
                <i class="fas fa-table me-1"></i>
                DataTable Category
            </div>
            <a href="{{ route('admin.category.add') }}" class="btn btn-link text-success px-3 mb-0"><i class="material-icons text-sm me-2">add</i>Add</a>
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
                            <form action="{{}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" href="/delete/{id}" class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                                <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.category.edit') }}"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection