@extends('master')

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })
        })
    </script>
@endsection



@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item Id</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Active</th>
                  <th>Product Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                <td>{{$product->item_id}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->categories_Name}}</td>
                <td>{{$product->isActive}}</td>
                <td>{{$product->product_description}}</td>
                <td>
                  <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>

    @endsection