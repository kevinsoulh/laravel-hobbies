@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Create new Hobby</div>
                <div class="card-body">
                    <form autocomplete="off" action="/hobby" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control{{ $errors->has('name') ? 'border-danger' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}">
                            <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                        </div>
                        <div class="form-group ">
                            <label for="description"></label>
                            <textarea class="form-control{{ $errors->has('description') ? 'border-danger' : '' }}" name="description" id="description" rows="5" value="{{ old('description') }}">
                            </textarea>
                            <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                        </div>
                        <input class="btn btn-primary mt-2 mb-4" type="submit" value="Save Hobby"></input>
                    </form>
                    <a class="btn btn-primary float-end" href="/hobby">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection