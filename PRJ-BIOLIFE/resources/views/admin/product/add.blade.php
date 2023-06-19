@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <form action="{{ route('admin.product.store') }}" method="post" class="form-control" >
            @method('POST')
            @csrf
            <h2>Add Product</h2>
            <div class="row">
                <div class="col-xl-12">
                    <label for="">Product Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <label for="">Product price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="col-xl-6">
                    <label for="">Product discounts</label>
                    <input type="text" name="discounts" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <label for="">Manufacturing Date</label>
                    <input type="date" name="mfg" class="form-control">
                </div>
                <div class="col-xl-3">
                    <label for="">Expiration Date</label>
                    <input type="date" name="exp" class="form-control">
                </div>
                <div class="col-xl-3">
                    <label for="">Weight</label>
                    <input type="number" name="weight" class="form-control">
                </div>
                <div class="col-xl-3">
                    <label for="">Origin</label>
                    <input type="text" name="origin" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <label for="">Product category</label>
                    <select name="category" id="" class="form-select">
                        <option value="">1</option>
                        <option value="">1</option>
                        <option value="">1</option>
                    </select>
                </div>
                <div class="col-xl-6">
                    <label for="">Product image</label>
                    <input type="file" name="images" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xl-12">
                    <label for="">Product description</label>
                    <textarea name="description" id="editor" cols="300" rows="20"></textarea>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </form>
    </div>
</div>
@endsection