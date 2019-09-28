@extends('master')

@section('styles')
    <style type="text/css">
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        var x=1
        function appendRow()
        {
          var d = document.getElementById('price-row');
          //  d.innerHTML += "<br><input type='text' id='tst"+ x++ +"'><br >";
           d.outerHTML  +=  "<br><div class='form-group'> <div class='row'><div class='col-md-3'><label for='exampleInputEmail1'>Quantity </label><input type='text' class='form-control' id='quantity' name='quantity[}' placeholder='Enter Products Name'></div><div class='col-md-3'><label for='exampleInputEmail1'>Price</label><input type='text' class='form-control' id='price' name='price[]' placeholder='Enter Products Name'></div></div></div>"
        }
    </script>
@endsection



@section('content')
<div class="container">
<form role="form" method="POST" action="{{ route('products.store') }}" style="margin-top: 100px;" enctype="multipart/form-data">
{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Item Id</label>
                  <input type="text" class="form-control" id="item_id" name="item_id" placeholder="Enter Products Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Products Name">
                </div>
                <div class="form-group">
                  <div class='row'>
                    <div class='col-md-3'>
                      <label>Category</label>
                    </div>
                    <div class='col-md-3'>
                      <select class="form-control" id="category_id" name="category_id">
                      @foreach($categories as $categ)
                        <option value="{{$categ->id}}">{{$categ->categories_Name}}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class='row'>
                    <div class='col-md-3'>
                      <label>Is Active</label>
                    </div>
                    <div class='col-md-3'>
                      <select class="form-control" id="isActive" name="isActive">
                        <option value='1'>Yes</option>
                        <option value='0'>No</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Main Image</label>
                  <input type="file" id="main_image_path" name="main_image_path">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Other Image</label>
                  <input multiple="multiple" name="photos[]" type="file">
                </div>
                <div class="form-group">
                  <label>Tiyer Price</label>
                </div>
                <div class="form-group" id="price-row">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="exampleInputEmail1">Quantity </label>
                      <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Enter Products Name">
                    </div>
                    <div class="col-md-3">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text" class="form-control" id="price" name="price[]" placeholder="Enter Products Name">
                    </div>
                    <div class="col-md-3">
                      <!-- <label for="exampleInputEmail1"></label> -->
                      <button type='button' class="btn btn-primary" id="add-price" onclick ="appendRow()" style="margin-top: 24px;"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Products Discrption</label>
                  <textarea class="form-control" rows="3" id="proDiscr" name="product_description" placeholder="Enter ..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                
</form>
</div>


@endsection
