@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="h3 card-header text-center"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{$film->country->name}}</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">{{$film->title}}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{$film->date}}</div>
                        <p class="card-text mb-auto">{{$film->description}}</p>
                        <!-- <a href="#">Go Back</a> -->
                        </div>
                        <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 250px; height: 250px;" src="{{ url($film->photo) }}" data-holder-rendered="true">
                    </div>

                    <form>
                        <input type="hidden" name="user">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Write a Comment</label>
                            <textarea class="form-control" name="comment" rows="3"></textarea>
                        </div>
                    </form>

                    <button class="btn btn-primary submit" onclick="event.preventDefault(); comment(event); ">Comment</button>

                    <div class="my-3 p-3 bg-white rounded shadow-sm">
                        <h6 class="border-bottom border-gray pb-2 mb-0">Comments</h6>
                         <div class="media text-muted pt-3">
                            <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <strong class="d-block text-gray-dark">@username</strong>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            </p>
                         </div>
                           <!--         
                            <small class="d-block text-right mt-3">
                            <a href="#">All updates</a>
                            </small> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('add_js')
<script>
   function submit(event) {
    let myId = event.target.id;
    var button = $('.submit');
    var isDisabled = true;
    var isAble = false;
    button.attr('disabled', isDisabled);

    setTimeout(function () {
        button.attr('disabled', !isDisabled);
    }, 10000)
    var arr = [];
    $('input, select, textarea').each(
    function(index){  
        var input = $(this);
        var name = input.attr('name');
        var val = input.val();
        
        arr[name] = val; //does not work
        // alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
     }
   );

   console.log(arr);

  axios
    .post("/api/comment", {
       user : {{Auth::id()}},
       film : {{$film->id}}
       comment : arr['comment'],
    })
    .then(function(response) {
        //console.log(esponse.data)
        window.toastr.success("Comment Added Succesfully", {
            timeOut: 3000
        });
        $("#myform")[0].reset();
        button.attr('disabled', isAble);
        location.reload();       
    })
    .catch(function(error) {
        var err = error.response.data.errors
        // console.log(err)
        //     for (val of err) {
        //        console.log(val);
        //      }

        // // err.forEach( function (data) {
        // //      window.toastr.error(data, {
        // //         timeOut: 3000
        // //     });
        // // });
        
      window.toastr.error(error.data, "Danger Alert", {
        timeOut: 3000
      });
      button.attr('disabled', isAble);
    //   console.log(error.response);
  });
}
</script>
@endsection