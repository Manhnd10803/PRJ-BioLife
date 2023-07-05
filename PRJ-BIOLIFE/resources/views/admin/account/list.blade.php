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
        
        {{-- @if(session('success'))
            <div class="alert alert-info" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @isset($message_fail)
            <div class="alert alert-warning" role="alert">
                {{ $message_fail }}
            </div>
        @endisset --}}

        <div class="card-body">
            
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        {{-- <th>STT</th> --}}
                        <th>ID</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        {{-- <th>Password</th> --}}
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($users as $u)
                        
                        <tr>
                            {{-- <td> 1</td> --}}
                            <td> {{ $u->id }} </td>
                            <td> {{ $u->name }} </td>
                            <td> {{ $u->fullname }}</td>
                            {{-- <td> {{ $u->password }} </td> --}}
                            <td> {{ $u->phone }}</td>
                            <td> {{ $u->address }}</td>
                            <td> {{ $u->email }}</td>
                            <td> {{ $u->role }}</td>
                            <td>
                                <form action="{{ route('admin.account.delete', $u->id) }}" method="get">
                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('admin.account.edit',$u->id) }}"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="material-icons text-sm me-2">delete</i>Delete</button>
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection