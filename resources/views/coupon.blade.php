@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="h3 card-header text-center">Show all coupons</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        @foreach($coupons as $coupon)
                          <li>
                              {{ $coupon->coupon }}
                         </li>
                        @endforeach
                    </ul>
                    
                    {{ $coupons->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
