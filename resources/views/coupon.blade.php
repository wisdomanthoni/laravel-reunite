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
                    <table>
                        @foreach($coupons as $coupon)
                          <tr>
                              {{ $coupon->coupon }}
                          </tr>
                        @endforeach
                    </table>
                    
                    {{ $coupons->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
