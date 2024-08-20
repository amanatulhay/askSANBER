@extends('layouts.master')

@section('judul1')
    EDIT CATEGORY
@endsection

@section('judul2')
    EDIT CATEGORY: {{$kategoriById->name}}
@endsection

@section('content')
    <form action="/kategori/{{$kategoriById->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" value="{{$kategoriById->name}}" class="form-control @error('name') is-invalid @enderror">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{$kategoriById->description}}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection