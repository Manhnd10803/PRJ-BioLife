@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <form action="" method="post" class="form-add-cate">
            @method('POST')
            @csrf
            <h2>Add Account</h2>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="" aria-describedby="">
                <div id="" class="form-text text-danger">You need to input</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="" aria-describedby="">
                <div id="" class="form-text text-danger">You need to input</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Repeat Password</label>
                <input type="password" name="repeat_password" class="form-control" id="" aria-describedby="">
                <div id="" class="form-text text-danger">You need to input</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="fullname" class="form-control" id="" aria-describedby="">
                <div id="" class="form-text text-danger">You need to input</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" name="email" class="form-control" id="" aria-describedby="" value="">
                <div id="" class="form-text text-danger">You need to input</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="" aria-describedby="">
                <div id="" class="form-text text-danger">You need to input</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" id="" aria-describedby="">
                <div id="" class="form-text text-danger">You need to input</div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Role</label>
                <select name="role" id="" class="form-select">
                    <option value="">Staff</option>
                    <option value="">Admin</option>
                    <option value="">Customer</option>
                </select>
                <div id="" class="form-text text-danger">You need to input</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection