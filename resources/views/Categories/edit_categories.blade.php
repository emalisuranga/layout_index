@extends('master')


@section('content')
<div class="container">
<form role="form" method="POST" action="{{ route('save-categories') }}" style="margin-top: 100px;">
{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" class="form-control" id="categories_Name" name="categories_Name" placeholder="Enter Products Name" value="{{$categories->categories_Name}}">
                </div>
                <div class="form-group">
                  <div class='row'>
                    <div class='col-md-3'>
                      <label>Is Active</label>
                    </div>
                    <div class='col-md-3'>
                      <select class="form-control" id="isActive" name="isActive" value="{{$categories->isActive}}">
                        <option value='1'>Yes</option>
                        <option value='0'>No</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Category Description</label>
                  <textarea class="form-control" rows="3" id="categories_description" name="categories_description" placeholder="Enter ..." value="{{$categories->categories_description}}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                
</form>
</div>

@endsection