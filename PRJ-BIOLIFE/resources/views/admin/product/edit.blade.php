@extends('layouts.appAdmin')
@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <form action="{{ route('admin.product.update') }}" method="post" class="form-control">
            @method('POST')
            @csrf
            <h2>Edit Product</h2>
            <div class="row">
                <div class="col-xl-12">
                    <label for="">Product Name</label>
                    <input type="text" name="name" class="form-control" value="Pear">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <label for="">Product price</label>
                    <input type="text" name="price" class="form-control" value="321.00">
                </div>
                <div class="col-xl-6">
                    <label for="">Product discounts</label>
                    <input type="text" name="discounts" class="form-control" value="123.00">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <label for="">Manufacturing Date</label>
                    <input type="date" name="mfg" class="form-control" value="2023-06-01">
                </div>
                <div class="col-xl-3">
                    <label for="">Expiration Date</label>
                    <input type="date" name="exp" class="form-control" value="2023-06-19">
                </div>
                <div class="col-xl-3">
                    <label for="">Weight</label>
                    <input type="number" name="weight" class="form-control" value="10">
                </div>
                <div class="col-xl-3">
                    <label for="">Origin</label>
                    <input type="text" name="origin" class="form-control" value="Vietnam">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <label for="">Product category</label>
                    <select name="category" id="" class="form-select">
                        <option value="">1</option>
                        <option value="" selected>Fruit</option>
                        <option value="">1</option>
                    </select>
                </div>
                <div class="col-xl-6">
                    <label for="">Product image</label>
                    <input type="file" name="images" class="form-control">
                    <img src="{{ asset('storage/images/products/p-01.jpg') }}" alt="" width="75">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xl-12">
                    <label for="">Product description</label>
                    <textarea name="description" id="editor" cols="300" rows="20">
                        <p>Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.</p><p><strong>Organic Fresh Fruit</strong></p><ul><li>100% real fruit ingredients</li><li>100 fresh fruit bags individually wrapped</li><li>Blending Eastern &amp; Western traditions, naturally</li></ul>
                    </textarea>
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