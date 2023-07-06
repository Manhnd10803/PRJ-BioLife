@extends('layouts.appAdmin')
@section('javascript')
    <script>
        let myForm  = document.getElementById('myForm');

        let username = document.getElementById('username');
        let fullname = document.getElementById('fullname');
        let password = document.getElementById('password');
        let repeat_password = document.getElementById('repeat_password');
        let address = document.getElementById('address');
        let email = document.getElementById('email');
        let phone_number = document.getElementById('phone_number');

        let error_username = document.querySelector('.error_username');
        let error_fullname = document.querySelector('.error_fullname');
        let error_password = document.querySelector('.error_password');
        let error_repeat_password = document.querySelector('.error_repeat_password');
        let error_address = document.querySelector('.error_address');
        let error_email = document.querySelector('.error_email');
        let error_phone_number = document.querySelector('.error_phone_number');

        myForm.addEventListener("submit", function (event) {
            // Kiểm tra khi user click submit.

            if (!username.validity.valid) {
                error_username.innerHTML = "The field is empty";
                error_username.className = "error_username";
                // Chặn việc submit form
                event.preventDefault();
            }

            if (!fullname.validity.valid) {
                error_fullname.innerHTML = "The field is empty";
                error_fullname.className = "error_fullname";
                // Chặn việc submit form
                event.preventDefault();
            }

            if (!password.validity.valid) {
                error_password.innerHTML = "The field is empty";
                error_password.className = "error_password";
                // Chặn việc submit form
                event.preventDefault();
            }

            if (!repeat_password.validity.valid) {
                error_repeat_password.innerHTML = "The field is empty";
                error_repeat_password.className = "error_repeat_password";
                // Chặn việc submit form
                event.preventDefault();
            }

            if (!address.validity.valid) {
                error_address.innerHTML = "The field is empty";
                error_address.className = "error_address";
                // Chặn việc submit form
                event.preventDefault();
            }

            if (!email.validity.valid) {
                error_email.innerHTML = "The field is empty";
                error_email.className = "error_email";
                // Chặn việc submit form
                event.preventDefault();
            }

            if (!phone_number.validity.valid) {
                error_phone_number.innerHTML = "The field is empty";
                error_phone_number.className = "error_phone_number";
                // Chặn việc submit form
                event.preventDefault();
            }

        }, false);

    </script>
@endsection
@section('content')
<div class="container-fluid px-4">
    <div class="row ">
        
        <form action=" {{ route('admin.account.update', $user->id) }} " method="post" class="form-add-cate" id="myForm" novalidate>
            
            @csrf
            @method('PUT')
            <h2>Edit Account</h2>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" value="{{ $user->name }}" class="form-control" id="username" required>
                <div id="" class="form-text text-danger error_username" aria-live="polite"></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="fullname" value="{{ $user->fullname }}"  class="form-control" id="fullname" required>
                <div id="" class="form-text text-danger error_fullname" aria-live="polite"></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password"   class="form-control" id="password" required>
                <div id="" class="form-text text-danger error_password" aria-live="polite"></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Repeat Password</label>
                <input type="password" name="repeat_password" class="form-control" id="repeat_password" required>
                <div id="" class="form-text text-danger error_repeat_password" aria-live="polite"></div>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" name="address" value="{{ $user->address }}"  class="form-control" id="address" required>
                <div id="" class="form-text text-danger error_address" aria-live="polite"></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" value="{{ $user->email }}"  class="form-control" id="email" required>
                <div id="" class="form-text text-danger error_email" aria-live="polite"></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" value="{{ $user->phone }}"  class="form-control" id="email" required>
                <div id="" class="form-text text-danger error_phone_number" aria-live="polite"></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Role</label>
                <select name="role" id="" class="form-select">
                    <option value="1" @if (!$user->role) selected @endif >Staff</option>
                    <option value="1" @if (!$user->role) selected @endif >Admin</option>
                    <option value="0" @if (!$user->role) selected @endif >Customer</option>
                </select>
                <div id="" class="form-text text-danger"></div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
    </div>
</div>
@endsection