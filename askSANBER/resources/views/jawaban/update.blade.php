@extends('layouts.master')

@section('judul1')
    Edit Answer
@endsection

@section('content')
    <form action="/jawaban/{{$jawaban->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10">{{$jawaban->content}}</textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Image URL</label>
            <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" value="{{$jawaban->image}}">
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection