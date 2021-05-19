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
                                &nbsp;<a style="text-decoration:none;" title="Show Details" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                @auth
                                <a class="btn btn-sm btn-outline-primary float-end" href="/hobby/{{ $hobby->id }}/edit">Edit</a>
                                &nbsp;<span class="mx-2">Posted by: <a style="text-decoration:none;" href="/user/{{ $hobby->user->id }}">{{ $hobby->user->name }} ({{ $hobby->user->hobbies->count() }} Hobbies)</a>
                                <form class="float-end" action="/hobby/{{ $hobby->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-outline-danger mx-2 " value="Delete">
                                </form>
                                @endauth
                                <span class="float-end">{{ $hobby->created_at->diffForHumans() }}</span>
                            </li>
                        @endforeach
                        <div class="mt-3">
                            {{ $hobbies->links() }}
                        </div>
                    </ul>
                    @auth
                    <div>
                        <a class="btn mt-3 btn-primary" href="/hobby/create">Create new Hobby</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection