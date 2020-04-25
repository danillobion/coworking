@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News</div>

                <div class="card-body">
                    <a >{{$newsDetail}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
