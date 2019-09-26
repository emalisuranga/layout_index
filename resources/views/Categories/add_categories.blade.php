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
                  <div class='row'>
                    <div class='col-md-3'>
                      <label>Is Active</label>
                    </div>
                    <div class='col-md-3'>
                      <select class="form-control">
                        <option value='1'>Yes</option>
                        <option value='0'>No</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Category Discrption</label>
                  <textarea class="form-control" rows="3" id="proDiscr" name="proDiscr" placeholder="Enter ..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                
</form>
</div>

@endsection