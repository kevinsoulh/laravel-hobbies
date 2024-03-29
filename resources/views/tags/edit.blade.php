@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Tag</div>
                    <div class="card-body">
                        <form autocomplete="off" action="/tag/{{$tag->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control{{$errors->has('name') ? ' border-danger' : ''}}" id="name" name="name" value="{{old('name') ?? $tag->name}}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="style">Style</label>
                                <textarea class="form-control{{$errors->has('style') ? ' border-danger' : ''}}" id="style" name="style" rows="5">{{old('style') ?? $tag->style}}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('style') !!}</small>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Update Tag">
                        </form>
                        <a class="btn btn-primary float-end" href="/tag"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection