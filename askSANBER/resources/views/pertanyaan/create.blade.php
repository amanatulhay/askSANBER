@extends('layouts.master')

@section('judul1')
    Add Question
@endsection

@section('judul2')
    Add Question
@endsection

@section('content')
    <form action="/pertanyaan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10"></textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Image URL</label>
            <input type="text" name="image" class="form-control @error('image') is-invalid @enderror">
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Category</label>
            <select name="kategori_id" id="" class="form-control">
                <option value="">-- Choose Category --</option>
                @forelse ($kategori as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                    <option value="">No Category Data</option>
                @endforelse
            </select>
        </div>
        @error('kategori_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection