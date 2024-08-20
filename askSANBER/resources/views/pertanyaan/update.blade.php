@extends('layouts.master')

@section('judul1')
    Edit Question
@endsection

@section('content')
    <form action="/pertanyaan/{{$pertanyaan->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{$pertanyaan->title}}" class="form-control @error('title') is-invalid @enderror">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10">{{$pertanyaan->content}}</textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Category</label>
            <select name="kategori_id" id="" class="form-control">
                <option value="">-- Choose Category --</option>
                @forelse ($kategori as $item)
                    @if ($item->id === $pertanyaan->kategori_id)
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                @empty
                    <option value="">No Category Data</option>
                @endforelse
            </select>
        </div>
        @error('tahun')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection