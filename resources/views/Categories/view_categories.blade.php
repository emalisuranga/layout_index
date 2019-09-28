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
                  <th>Categories</th>
                  <th>Categories Discrpiton</th>
                  <th>Active</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $categori)
                <tr>
                <td>{{$categori->categories_Name}}</td>
                <td>{{$categori->categories_description}}</td>
                <td>{{$categori->isActive}}</td>
                <td>
                  <a href="{{ route('categories.edit',$categori->id)}}" class="btn btn-primary">Edit</a>
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