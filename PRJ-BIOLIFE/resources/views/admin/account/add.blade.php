@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid px-4">
    <div class="row cen" ng-app="">
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action=" {{ route('admin.account.store') }} " method="post" class="form-add-cate" name="myForm" novalidate="" >
            
            @csrf
            @method('POST')

            <h2>Add Account</h2>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" ng-model="username" required>
                <div ng-show="myForm.$submitted || myForm.username.$dirty" class="form-text text-danger">
                    <span class="error" ng-show="myForm.username.$error.required">The field is empty</span>
                    {{-- <span ng-show="form.username.$error.email">Không đúng định dạng email</span> --}}
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="fullname" class="form-control" ng-model="fullname" required>
                <div ng-show="myForm.$submitted || myForm.fullname.$dirty" class="form-text text-danger">
                    <span class="error" ng-show="myForm.fullname.$error.required">The field is empty</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" ng-model="password" ng-minlength="8" ng-maxlength="18" required>
                
                <div ng-show="myForm.$submitted || myForm.password.$dirty" class="form-text text-danger">
                    <span class="error" ng-show="myForm.password.$error.required" >The field is empty</span>
                    <span class="error" ng-show="((myForm.password.$error.minlength || myForm.password.$error.maxlength) &amp;&amp; myForm.password.$dirty)">Passwords must be more than 8 characters and less than 18 characters</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Repeat Password</label>
                <input type="password" name="repeat_password" class="form-control" ng-model="repeat_password" ng-minlength="8" ng-maxlength="18" required>
                <div ng-show="myForm.$submitted || myForm.repeat_password.$dirty" class="form-text text-danger">
                    <span class="error" ng-show="myForm.repeat_password.$error.required">The field is empty</span>
                    {{-- <span class="error" ng-show="myForm.fullname.$error.required">Not coincided with the password</span> --}}
                </div>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" ng-model="address" required>
                
                <div ng-show="myForm.$submitted || myForm.address.$dirty" class="form-text text-danger">
                    <span class="error" ng-show="myForm.address.$error.required">The field is empty</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" ng-model="email" ng-pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,4}$" autocomplete="off" required>
                
                <div ng-show="myForm.$submitted || myForm.email.$dirty" class="form-text text-danger">
                    <span class="error" ng-show="myForm.email.$error.required">The field is empty</span>
                    <span class="error" ng-show="myForm.email.$error.pattern">Email invalidate</span>
                    
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" ng-model="phone_number" ng-minlength="10" ng-maxlength="10" required>
                
                <div ng-show="myForm.$submitted || myForm.phone_number.$dirty" class="form-text text-danger">
                    <span class="error" ng-show="myForm.phone_number.$error.required">The field is empty</span>
                    {{-- <span class="error" ng-show="!myForm.phone_number.$error.pattern">Wrong phone number entered</span> --}}
                    <span class="error" ng-show="((myForm.phone_number.$error.minlength || myForm.phone_number.$error.maxlength) &amp;&amp; myForm.phone_number.$dirty)">Phone number should be 10 digits</span>

                </div>
                
            </div>
            <div class="mb-3">
                <label for="" class="form-label" >Role</label>
                <select name="role" class="form-select" >
                    <option value="1">Staff</option>
                    <option value="1">Admin</option>
                    <option value="0" selected>Customer</option>
                </select>
                
                {{-- <div ng-show="form.role.$dirty && form.role.$invalid" class="form-text text-danger">
                    <span class="error" ng-show="myForm.fullname.$error.required">The field is empty</span>
                </div> --}}
            </div>
            <button type="submit" class="btn btn-primary" ng-disabled="myForm.$invalid">Submit</button>
        </form>

    </div>
</div>
@endsection