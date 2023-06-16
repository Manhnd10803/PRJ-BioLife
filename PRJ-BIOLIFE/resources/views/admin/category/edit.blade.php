@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">UPDATE CATEGORY</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Quản trị danh mục sản phẩm.</li>
    </ol>
    <div class="alert alert-primary mb-0 alert-dismissible alert-absolute fade show " id="alertExample" role="alert" data-mdb-color="secondary">
        <i class="fas fa-check me-2"></i>
        Thông báo sửa thành công hoặc thất bại
        <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        
        <form class="form-add-cate">
            <!-- ID input -->
            <div class="form-outline mb-4">

              <label class="form-label" for="form5Example1">ID Category : </label>  
              <input type="number" id="form5Example1" class="form-control" placeholder="Autonumber" disabled/>
              
            </div>
          
            <!-- Name input -->
            <div class="form-outline mb-4">

              <label class="form-label" for="form5Example2">Name Category : </label>  
              <input type="text" id="form5Example2" class="form-control" />
              
            </div>
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Update Category</button>
          </form>
        
    </div>
    
</div>
@endsection