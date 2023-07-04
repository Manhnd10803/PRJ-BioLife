@extends('layouts.appAdmin')
@section('javascript')
    <script>
        function validate(){
            let name = document.querySelector('#name').value;
            let icon = document.querySelector('#icon').value;
      
            let error_name = document.querySelector('.error_name');
            let error_icon = document.querySelector('.error_icon');
            
            let check = true;
            if(name == ''){
                error_name.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_name.innerHTML = '';
            }
            if(icon == ''){
                error_icon.innerHTML = "You can't leave it blank";
                check = false;
            }else{
                error_icon.innerHTML = '';
            }

            return check;
        }
    </script>
@endsection
@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <form class="form-add-cate" method="post" class="form-control" action="{{ route('admin.category.edit',$category->id) }}>
            @method('PUT')
            @csrf
            <!-- ID input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form5Example1">ID Category : </label>  
              <input type="number" id="id" name="id" class="form-control" placeholder="Autonumber" value="{{$category->id}}" id="id" disabled/>
            </div>
            <!-- Name input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form5Example2">Name Category : </label>  
              <input type="text" id="name" name="name" class="form-control" value="{{$category->nameCategory}}" />
              <p class="text-danger error_name"></p>
            </div>
            <!-- Icon input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form5Example1">Icon Category : </label>  
              <input type="text" name="icon" id="icon" class="form-control" value="{{$category->iconCategory}}"/>
              <p class="text-danger error_icon"></p>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Update Category</button>
          </form>
    </div>
</div>
@endsection