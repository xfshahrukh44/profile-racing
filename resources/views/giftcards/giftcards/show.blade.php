@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Giftcard {{ $giftcard->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/giftcards/giftcards') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $giftcard->id }}</td>
                            </tr>
                            <tr><th> Code </th><td> {{ $giftcard->code }} </td></tr><tr><th> Balance </th><td> {{ $giftcard->balance }} </td></tr><tr><th> Expiry Date </th><td> {{ $giftcard->expiry_date }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

