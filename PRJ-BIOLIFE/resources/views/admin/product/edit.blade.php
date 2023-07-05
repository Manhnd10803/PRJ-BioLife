@extends('layouts.appAdmin')
@section('javascript')
    <script>
        function validate(){
            let name = document.querySelector('#name').value;
            let price = document.querySelector('#price').value;
            let discounts = document.querySelector('#discounts').value;
            let mfg = document.querySelector('#mfg').value;
            let exp = document.querySelector('#exp').value;
            let weight = document.querySelector('#weight').value;
            let origin = document.querySelector('#origin').value;
            // let description = document.querySelector('.ck-content').value;
            // console.log(description);

            let check = true;
            let error_name = document.querySelector('.error_name');
            let error_price = document.querySelector('.error_price');
            let error_discounts = document.querySelector('.error_discounts');
            let error_mfg = document.querySelector('.error_mfg');
            let error_exp = document.querySelector('.error_exp');
            let error_weight = document.querySelector('.error_weight');
            let error_origin = document.querySelector('.error_origin');
            // let error_description = document.querySelector('.error_description');
            if(name == ''){
                error_name.innerHTML = 'The field is empty';
                check = false;
            }else{
                error_name.innerHTML = ''
            }
            if(price == ''){
                error_price.innerHTML = 'The field is empty';
                check = false;
            }else{
                error_price.innerHTML = ''
            }
            if(discounts == ''){
                error_discounts.innerHTML = 'The field is empty';
                check = false;
            }else{
                error_discounts.innerHTML = ''
            }
            if(mfg == ''){
                error_mfg.innerHTML = 'The field is empty';
                check = false;
            }else{
                error_mfg.innerHTML = ''
            }
            if(exp == ''){
                error_exp.innerHTML = 'The field is empty';
                check = false;
            }else if(exp <= mfg){
                error_exp.innerHTML = 'Invalid expiration date';
                check = false;
            }else{
                error_exp.innerHTML = ''
            }
            if(weight == ''){
                error_weight.innerHTML = 'The field is empty';
                check = false;
            }else{
                error_weight.innerHTML = ''
            }
            if(origin == ''){
                error_origin.innerHTML = 'The field is empty';
                check = false;
            }else{
                error_origin.innerHTML = ''
            }
            // if(description == ''){
            //     error_description.innerHTML = 'The field is empty';
            //     check = false;
            // }else{
            //     error_description.innerHTML = ''
            // }
            return check;
        }
    </script>
@endsection
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <form action="{{ route('admin.product.update', $product->idProduct ) }}" method="post" class="form-control" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <h2>Edit Product</h2>
            <div class="row">
                <div class="col-xl-12">
                    <label for="">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->nameProduct }}">
                    <p class="text-danger error_name"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <label for="">Product price</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ $product->priceProduct }}">
                    <p class="text-danger error_price"></p>
                </div>
                <div class="col-xl-6">
                    <label for="">Product discounts</label>
                    <input type="text" name="discounts" id="discounts" class="form-control" value="{{ $product->priceSaleProduct }}">
                    <p class="text-danger error_discounts"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <label for="">Manufacturing Date</label>
                    <input type="date" name="mfg" id="mfg" class="form-control" value="{{ $product->mfgProduct }}">
                    <p class="text-danger error_mfg"></p>
                </div>
                <div class="col-xl-3">
                    <label for="">Expiration Date</label>
                    <input type="date" name="exp" id="exp" class="form-control" value="{{ $product->expProduct }}">
                    <p class="text-danger error_exp"></p>
                </div>
                <div class="col-xl-3">
                    <label for="">Weight</label>
                    <input type="text" name="weight" id="weight" class="form-control" value="{{ $product->weightProduct }}">
                    <p class="text-danger error_weight"></p>
                </div>
                <div class="col-xl-3">
                    <label for="">Origin</label>
                    <input type="text" name="origin" id="origin" class="form-control" value="{{ $product->originProduct }}">
                    <p class="text-danger error_origin"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <label for="">Product category</label>
                    <select name="category" id="" class="form-select">
                        @foreach ($category as $item)
                        <option value="{{ $item->idCategory }}" @selected($product->idCategory == $item->idCategory )>{{ $item->nameCategory }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-6">
                    <label for="">Product image</label>
                    <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                    @error('images')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @foreach ($images as $image)
                    <img src="{{ asset('storage/'.$image->srcImage) }}" alt="" width="100">
                    @endforeach
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xl-12">
                    <label for="">Product description</label>
                    <textarea name="description" id="editor" cols="300" rows="20">
                        {{ $product->descriptionProduct }}
                    </textarea>
                    @error('description')
                    <p class="text-danger error_description">{{ $message }}</p>
                    @enderror
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary" onclick="return validate()">Submit</button>
        </form>
    </div>
</div>
@endsection