@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div>
                <i class="fas fa-table me-1"></i>
                DataTable Account
            </div>
            <a href="{{ route('admin.account.add') }}" class="btn btn-primary">Add</a>
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
                                <button type="button" class="btn btn-danger">Delete</button>
                                <a href="{{ route('admin.account.edit') }}" class="btn btn-success">Update</a>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection