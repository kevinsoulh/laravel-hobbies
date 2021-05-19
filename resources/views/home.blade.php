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
                            <h5>Your Motto</h5>
                            <p>{{ auth()->user()->motto ?? '' }}</p>
                            <h5>Your "About Me"</h5>
                            <p>{{ auth()->user()->about_me ?? '' }}</p>
                            <p>
                                <a class="btn btn-sm btn-primary" href="user/{{ auth()->user()->id }}/edit">Edit Profile</a>
                            </p>
                        </div>
                    </div>
                    @isset($hobbies)
                        @if($hobbies->count() > 0)
                        <h3>Your Hobbies:</h3>
                        @endif
                            <ul class="list-group">
                                @foreach($hobbies as $hobby)
                                    <li class="list-group-item">
                                        &nbsp;<a title="Show Details" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                        @auth
                                            <a class="btn btn-sm btn-light ml-2" href="/hobby/{{ $hobby->id }}/edit">Edit Hobby</a>
                                        @endauth

                                        @auth
                                            <form class="float-right" style="display: inline" action="/hobby/{{ $hobby->id }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                            </form>
                                        @endauth
                                        <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                        <br>
                                        @foreach($hobby->tags as $tag)
                                            <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                    @endisset

                    <a class="btn btn-success btn-sm" href="/hobby/create"><i class="fas fa-plus-circle"></i> Create new Hobby</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
