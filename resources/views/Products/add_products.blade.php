@extends('welcome')

@section('styles')
    <style type="text/css">
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
      Dropzone.options.myAwesomeDropzone = {
            paramName: "file",
            maxFilesize: 10,
            url: 'UploadImages',
            previewsContainer: "#dropzone-previews",
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 20,
            init: function() {
                var cd;
                this.on("success", function(file, response) {
                    $('.dz-progress').hide();
                    $('.dz-size').hide();
                    $('.dz-error-mark').hide();
                    console.log(response);
                    console.log(file);
                    cd = response;
                });
                this.on("addedfile", function(file) {
                    var removeButton = Dropzone.createElement("<a href=\"#\">Remove file</a>");
                    var _this = this;
                    removeButton.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        _this.removeFile(file);
                        var name = "largeFileName=" + cd.pi.largePicPath + "&smallFileName=" + cd.pi.smallPicPath;
                        $.ajax({
                            type: 'POST',
                            url: 'DeleteImage',
                            data: name,
                            dataType: 'json'
                        });
                    });
                    file.previewElement.appendChild(removeButton);
                });
            }
        };
    </script>
@endsection



@section('content')
<form class="container">
<form role="form" action="{{ route('save-categories') }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Item Id</label>
                  <input type="text" class="form-control" id="proName" name="proName" placeholder="Enter Products Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" id="proName" name="proName" placeholder="Enter Products Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
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
                  <label for="exampleInputFile">Main Image</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Other Image</label>
                  <div action="UploadImages"
                              class="dropzone"
                              id="my-awesome-dropzone" enctype="multipart/form-data">
                  </div>
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                  
                <div class="form-group">
                  <label>Products Discrption</label>
                  <textarea class="form-control" rows="3" id="proDiscr" name="proDiscr" placeholder="Enter ..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                
</form>
</div>


@endsection