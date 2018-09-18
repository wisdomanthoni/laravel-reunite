@extends('layouts.app')

@section('content')
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

                    <form>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
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