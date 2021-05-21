@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h2>Hello {{ auth()->user()->name }}</h2>
                            <h5>My Motto:</h5>
                            <p>{{ auth()->user()->motto ?? '' }}</p>
                            <h5>About Me:</h5>
                            <p>{{ auth()->user()->about_me ?? '' }}</p>
                            <p>
                                <a class="btn btn-sm btn-primary" href="user/{{ auth()->user()->id }}/edit">Edit Profile</a>
                            </p>
                        </div>
                    </div>
                    @isset($hobbies)
                        @if($hobbies->count() > 0)
                        <h3>My Hobbies:</h3>
                        @endif
                    <ul class="list-group">
                        @foreach($hobbies as $hobby)
                            <li class="list-group-item">
                                &nbsp;<a style="text-decoration:none;" title="Show Details" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                &nbsp;<span class="mx-2"><a style="text-decoration:none;" href="/user/{{ $hobby->user->id }}">({{ $hobby->user->hobbies->count() }} Hobbies)</a>
                                @auth
                                    <a class=" mx-2 float-end btn btn-sm btn-outline-primary ml-2" href="/hobby/{{ $hobby->id }}/edit"> Edit</a>
                                @endauth

                                @auth
                                    <form class="float-end" style="display: inline" action="/hobby/{{ $hobby->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                @endauth
                                <span class="float-end mx-2">{{ $hobby->created_at->format('M j, Y') }}</span>
                                <br>
                                @foreach($hobby->tags as $tag)
                                    <span style="font-size: 70%;" class="badge rounded-pill bg-{{ $tag->style }}">{{ $tag->name }}</span>
                                @endforeach
                            </li>
                        @endforeach
                    </ul>
                    @endisset

                    <a class="mt-3 btn btn-primary" href="/hobby/create"> Create new Hobby</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
