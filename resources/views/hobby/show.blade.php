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
                    <b>Assigned Tags:</b>(Click to unassign)
                    <p>
                    @foreach($hobby->tags as $tag)
                        <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/detach"><span class="badge rounded-pill bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
                    @endforeach
                    </p>
                    <b>Available Tags:</b>(Click to assign)
                    <p>
                    @foreach($availableTags as $tag)
                        <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/attach"><span class="badge rounded-pill bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
                    @endforeach
                    </p>
                </div>
                <div class="col-md-3">
                    @if(Auth::user() && file_exists('img/hobbies/' . $hobby->id . '_large.jpg'))
                        <a href="/img/hobbies/{{$hobby->id}}_large.jpg" data="img/hobbies/{{$hobby->id}}_large.jpg" data-title="{{ $hobby->name }}">
                            <img class="img-fluid" src="/img/hobbies/{{$hobby->id}}_large.jpg" alt="">
                        </a>
                            Click image to enlarge
                    @endif

                    @if(!Auth::user() && file_exists('img/hobbies/' . $hobby->id . '_pixelated.jpg'))
                        <img class="img-fluid" src="/img/hobbies/{{$hobby->id}}_pixelated.jpg" alt="">
                    @endif
                </div>
            </div>
            <a class="btn btn-primary mt-2" href="/home">Back</a>
        </div>
    </div>
</div>
@endsection