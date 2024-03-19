@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">RaceTeamMember {{ $raceteammember->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/admin/race-team-member') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $raceteammember->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $raceteammember->name }} </td></tr><tr><th> Image </th><td> {{ $raceteammember->image }} </td></tr><tr><th> Facebook </th><td> {{ $raceteammember->facebook }} </td></tr>
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

