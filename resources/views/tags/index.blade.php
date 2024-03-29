@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tags</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($tags as $tag)
                            <li class="list-group-item">
                                <span style="font-size: 90%;" class="my-2 badge rounded-pill bg-{{ $tag->style }}">{{ $tag->name }}</span>
                                @auth
                                <a class="btn btn-sm btn-outline-primary float-end ml-2" href="/tag/{{ $tag->id }}/edit">Edit</a>
                                <form style="display: inline;" action="/tag/{{ $tag->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-sm btn-outline-danger mx-2 float-end" type="submit" value="Delete">
                                </form>
                                @endauth
                                <span class="float-end">Used {{ $tag->hobbies->count() }} times</span></span>
                            </li>
                        @endforeach
                    </ul>
                    @auth
                    <a class="btn mt-3 btn-primary" href="/tag/create">Create new Tag</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection