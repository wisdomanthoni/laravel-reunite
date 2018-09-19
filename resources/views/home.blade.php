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
                    @foreach($films as $film)
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">{{$film->country->name}}</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">{{$film->title}}</a>
                            </h3>
                            <div class="mb-1 text-muted">{{$film->date}}</div>
                            <p class="card-text mb-auto">{{$film->description}}</p>
                            <a href="{{url('/film/'.$film->slug)}}">Continue reading</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 250px; height: 250px;" src="{{ url($film->photo) }}" data-holder-rendered="true">
                        </div>
                    @endforeach

                    {{ $films->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
