@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Hobby Details</div>
                <div class="card-body">
                    <p><strong>Hobby name: </strong>{{ $hobby->name }}</p>
                    <p><strong>Hobby description: </strong>{{ $hobby->description }}</p>
                </div>
            </div>
            <a class="btn btn-primary mt-2" href="/hobby">Back</a>
        </div>
    </div>
</div>
@endsection