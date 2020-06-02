@extends('layout')
@section('dashboard-content')
    <h1> Create Product form</h1>

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('post-product-form') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> SKU </label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productSKU">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Product name </label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" name="productName">
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1"> List Price </label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="listPrice">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Sale Price </label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="salePrice">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Product Discount </label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productDiscount">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Product Detail </label>
            <textarea name="productDetail" id="editor1"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Select product category </label>
            <select class="form-control" name="category">
                <option> Select </option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Product Photo </label>
            <input type="file" class="form-control" name="productPhoto" onchange="loadPhoto(event)">
        </div>
        
            <img id="photo" height="100" width="100">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Warranty </label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" name="warranty">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Is Hot Product </label>
            <input type="checkbox" name="isHotProduct"/>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Is New Arrival </label>
            <input type="checkbox" name="isNewArrival"/>
            
            <div class="form-group">
            <label for="exampleInputEmail1"> Select Keyword </label>
            <select class="form-control" name="merchandisingKeyword">
                <option> Select </option>
                @foreach($categories as $category)
                    <option value="{{ $category->keyword }}"> {{ $category->keyword }}</option>
                @endforeach
            </select>
        </div>
            
      
        
        
        <div class="form-group">
            <label for="exampleInputEmail1"> Tax </label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="tax">
        </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
                </form>

    <script>
        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@stop



















