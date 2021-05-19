@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Hobby Details</div>
                <div class="card-body">
                    <p><b>Hobby Name: </b><br>{{ $hobby->name }}</p>
                    <p><b>Hobby Description: </b><br>{{ $hobby->description }}</p>
                </div>
            </div>
            <a class="btn btn-primary mt-2" href="{{ URL::previous() }}">Back</a>
        </div>
    </div>
</div>
@endsection