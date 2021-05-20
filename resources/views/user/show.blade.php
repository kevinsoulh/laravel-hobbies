@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card"> 
                <div class="card-header">Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <b>My Motto:</b><br> {{ $user->motto }}
                            <p class="mt-2"><b>About Me:</b><br>{{ $user->about_me }}</p>

                            <h5>Hobbies of {{ $user->name }}</h5>
                            <ul class="list-group"> 
                                @if($user->hobbies->count() > 0)
                                    @foreach($user->hobbies as $hobby)
                                        <li class="list-group-item">
                                            &nbsp;<a style="text-decoration:none;" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                            <br>
                                            @foreach($hobby->tags as $tag)
                                                <span class="badge rounded-pill bg-{{ $tag->style }}">{{ $tag->name }}</span>
                                            @endforeach
                                        </li>
                                    @endforeach
                                @endif        
                            </ul>
                            <a class="btn btn-primary mt-3" href="/hobby">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection