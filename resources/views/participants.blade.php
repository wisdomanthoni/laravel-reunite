@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="h3 card-header text-center">Show all participants</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="content table-responsive table-full-width">
                        <table id="p-table" class="table table-sm table-striped">
                            <thead>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Plan</th>
                                 <th>Amount</th>
                                 <th>Coupon</th>
                            </thead>
                            <tbody>
                                @forelse ($participants as $participant)
                                    <tr>
                                        <td>{{$loop->index + 1}}}</td>
                                        <td>{{$participant->firstname}} {{$participant->lastname}}</td>
                                        <td>{{$participant->email}}</td>
                                        <td>{{$participant->plan}}</td>
                                        <td>{{$participant->amount}}</td>
                                        <td>{{$participant->coupon}}</td>
                                    </tr>
                                @empty
                                   
                                @endforelse
                                
                            </tbody>
                        </table>

                    </div>

                    {{ $participants->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('plugin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap.min.css"> --}}
   
@endpush

@section('add_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script> --}}
    <script>
        $(document).ready( function () {
            $('#p-table').DataTable();
        } );
   </script>
@endsection