@extends('layouts.master')

@section('judul1')
PROFILE
@endsection

@section('judul2')
UPDATE PROFILE
@endsection

@section('content')
<form action="/profile/{{$detailProfile->id}}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
        <label>User Name</label>
            <input type="text" class="form-control" value="{{$detailProfile->user->name}}" disabled >
    </div>

    <div class="form-group">
        <label>Email</label>
            <input type="text" class="form-control" value="{{$detailProfile->user->email}}" disabled >
    </div>
    
    <div class="form-group">
        <label for="umur">Age</label>
            <input id="umur" type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{$detailProfile->umur}}" >
            @error('umur')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group">
        <label for="bio">Biodata</label>
            <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" >{{$detailProfile->bio}}</textarea>
            @error('bio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group">
        <label for="alamat">Address</label>
            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" >{{$detailProfile->alamat}}</textarea>
            @error('alamat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection