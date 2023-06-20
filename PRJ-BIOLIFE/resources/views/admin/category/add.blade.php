@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    
    <div class="row">
        
        <form class="form-add-cate" method="post" class="form-control" >
            @method('POST')
            @csrf
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
            <button type="submit" class="btn btn-primary btn-block mb-4">Add Category</button>
          </form>
        
    </div>
    
</div>
@endsection