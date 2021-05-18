@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Create new Tag</div>
                <div class="card-body">
                    <form autocomplete="off" action="/tag" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control{{ $errors->has('name') ? 'border-danger' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}">
                            <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                        </div>
                        <div class="form-group ">
                            <label for="style">Style</label>
                            <textarea class="form-control{{ $errors->has('style') ? 'border-danger' : '' }}" name="style" id="style" rows="5" value="{{ old('style') }}">
                            </textarea>
                            <small class="form-text text-danger">{!! $errors->first('style') !!}</small>
                        </div>
                        <input class="btn btn-primary mt-2 mb-4" type="submit" value="Save Tag"></input>
                    </form>
                    <a class="btn btn-primary float-end" href="/tag">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection