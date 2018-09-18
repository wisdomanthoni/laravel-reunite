@extends('layouts.app')

@section('content')
<style>
  #my-dropzone .message {
    font-family: "Segoe UI Light", "Arial", serif;
    font-weight: 600;
    color: #0087F7;
    font-size: 1.5em;
    letter-spacing: 0.05em;
}

.dropzone .img {
    border: 2px dashed #0087F7;
    background: white;
    border-radius: 5px;
    min-height: 300px;
    padding: 90px 0;
    vertical-align: baseline;
}
  </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="h3 card-header text-center">Show all Films</div>
             
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                   <div class="row">
                      <div class="col-6">
                         <form action="/api/upload" class="dropzone mb-3" id="filmPicture">
                           {{ csrf_field() }}
                         </form>
                      </div>
                      <div class="col-6">
                          <img id="film-pic" class="m-auto d-lg-block img"  alt="Thumbnail [200x250]" style="width: 200px; height: 200px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_165ede46b7a%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_165ede46b7a%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                     </div>
                   </div>

                    <form>
                        <input type="hidden" name="photo" id="picurl" value="">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Film Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>

                        <div class="form-group">
                            <label for="date">Release Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>

                        
                        <div class="form-inline">
                           <label class="pr-3 form-check-label" for="rating">Rating</label> <br>

                           <ul class="nav nav-pills">                                
                                <li class="nav-item">
                                    1<input type="radio" name="rating" class="px-3 mx-1 form-check-input" value="1"> 
                                </li>
                                <li class="nav-item">
                                    2<input type="radio" name="rating" class="px-3 mx-1 form-check-input" value="2"> 
                                </li>
                                <li class="nav-item">
                                    3<input type="radio" name="rating" class="px-3 mx-1 form-check-input" value="3"> 
                                </li>
                                 <li class="nav-item">
                                    4<input type="radio" name="rating" class="px-3 mx-1 form-check-input" value="4"> 
                                </li>   
                                <li class="nav-item">
                                    5<input type="radio" name="rating" class="px-3 mx-1 form-check-input" value="5"> 
                                </li>             
                            </ul>
                            
                        </div>
                        
                        <br>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Country</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('app-css')
<script>
   Dropzone.options.filmPicture = {
      paramName: "pic", // The name that will be used to transfer the file
      maxFilesize: 5, // MB
      withCredentials: true,
      addRemoveLinks: true,
      dictRemoveFile: 'Remove file',
      dictFileTooBig: 'Image is larger than 5MB',
      timeout: 100000,
      uploadMultiple: false,
      url: "/api/upload",
      success: function(file, response) {
        $('#film-pic').attr("src",response)
                  $('#picurl').val(response);
                  window.toastr.success("Film Picture Uploaded Successfully", "Success Alert", {
                    timeOut: 3000
                  });
      },
      error: function(file, response) {
        window.toastr.error("Unable to upload film picture, please check your network and try again", "Upload Error", {
          timeOut: 3000
        });
      }
    };
</script>
@endsection