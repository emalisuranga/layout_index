@extends('welcome')


@section('content')
<div class="container">
<form role="form" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control" id="proName" name="proName" placeholder="Enter Products Name">
                </div>
                <div class="form-group">
                  <label>Category Discrption</label>
                  <textarea class="form-control" rows="3" id="proDiscr" name="proDiscr" placeholder="Enter ..."></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
</form>
</div>

@endsection