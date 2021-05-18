@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form autocomplete="off" action="/user/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="motto">Motto</label>
                            <input type="text" class="form-control{{ $errors->has('motto') ? ' border-danger' : '' }}" id="motto" name="motto" value="{{ old('motto') ?? $user->motto }}">
                            <small class="form-text text-danger">{!! $errors->any('motto') !!}</small>
                        </div>
                        <div class="form-group">
                            <label for="about_me">About me</label>
                            <textarea class="form-control" id="about_me" name="about_me" rows="5">{{ old('about_me') ?? $user->about_me }}</textarea>
                            <small class="form-text text-danger">{!! $errors->any('about_me') !!}</small>
                        </div>
                        <input class="btn btn-primary mt-4" type="submit" value="Save Profile">
                    </form>
                    <a class="btn btn-primary float-end" href="/home">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection