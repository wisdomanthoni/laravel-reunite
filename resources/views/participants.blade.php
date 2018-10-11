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
                                <th>Competition</th>
                                <th>Home</th>
                            </thead>
                            <tbody>
                                @forelse ($participants as $participant)
                                    <tr>
                                        <td>1</td>
                                        <td>Dakota Rice</td>
                                        <td>$36,738</td>
                                    </tr>
                                    {{$participant}}
                                    {{$participant->coupon}}
                                @empty
                                   <tr>
                                    <td>No Participant </td> 
                                   </tr>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready( function () {
        $('#p-table').DataTable();
    } );
</script>
@endpush