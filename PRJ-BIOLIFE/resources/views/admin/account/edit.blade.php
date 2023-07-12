@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    @if (Session::has('success'))
        <span class="badge text-bg-danger" style="color: red;">{{ Session::get('success') }}</span>
    @endif
    <div class="row ">
        
        <form action=" {{ route('admin.account.update', $user->id) }} " method="post" class="form-add-cate" id="myForm" novalidate>
            
            @csrf
            @method('PUT')
            <h2>Edit Account</h2>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" value="{{ $user->name }}" class="form-control" id="username" required>
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="fullname" value="{{ $user->fullname }}"  class="form-control" id="fullname" required>
                {{-- <div id="" class="form-text text-danger error_fullname" aria-live="polite"></div> --}}
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password"   class="form-control" id="password" required>
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Repeat Password</label>
                <input type="password" name="repeat_password" class="form-control" id="repeat_password" required>
                
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" name="address" value="{{ $user->address }}"  class="form-control" id="address" required>
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" value="{{ $user->email }}"  class="form-control" id="email" required>
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" value="{{ $user->phone }}"  class="form-control" id="email" required>
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Role</label>
                <select name="role" id="" class="form-select">
                    <option value="1" @if (!$user->role) selected @endif >Staff</option>
                    <option value="1" @if (!$user->role) selected @endif >Admin</option>
                    <option value="0" @if (!$user->role) selected @endif >Customer</option>
                </select>
                
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
    </div>
</div>

@endsection