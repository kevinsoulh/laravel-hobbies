@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">All the Hobbies</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($hobbies as $hobby)
                            <li class="list-group-item">
                                {{ $hobby->name }}
                                <a class="btn btn-outline-primary float-end" href="/hobby/{{ $hobby->id }}/edit">Edit Hobby</a>
                                &nbsp<a href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                <form class="float-end" action="/hobby/{{ $hobby->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-outline-danger mx-2 " value="Delete">
                                </form>
                            </li>
                        @endforeach
                    </ul>
                    <div>
                        <a class="btn mt-3 btn-primary" href="/hobby/create">Create new Hobby</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection