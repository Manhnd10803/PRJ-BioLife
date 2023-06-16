@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div>
                <i class="fas fa-table me-1"></i>
                DataTable Account
            </div>
            <a href="{{ route('admin.account.add') }}" class="btn btn-link text-success px-3 mb-0"><i class="material-icons text-sm me-2">add</i>Add</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Manhnd10803</td>
                        <td>Nguyễn Đức Mạnh</td>
                        <td>0377377897</td>
                        <td>Xuân Hòa - Phúc Yên - Vĩnh Phúc</td>
                        <td>manhnd10803@gmail.com</td>
                        <td>Admin</td>
                        <td>
                            <form action="" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                                <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.account.edit') }}"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection