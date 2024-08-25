@extends('layouts.master')

@section('judul1')
    Detail of Question
@endsection

@section('judul2')
    Question: {{$pertanyaan->title}}
@endsection

@section('content')
<a href="/pertanyaan" class="btn btn-primary btn-sm mb-3">Back to List of Questions</a>

    <div class="card-body">
        <h5 class="text-primary">{{$pertanyaan->title}}</h5>
        <p>Category: <span class="badge badge-info"> {{$pertanyaan->kategori->name}}</span></p>
        
        <p class="card-text">{!!$pertanyaan->content!!}</p>
        <img style="width: 300px" src="{{$pertanyaan->image}}" class="card-img-top pb-4" alt="">
        <p>Asked by: {{$pertanyaan->user->name}}</p>
    </div>

    <br>
    <h3>Answers</h3>
    <br>

    @forelse ($pertanyaan->jawaban as $item)
    <div class="card">
        <div class="card-header bg-dark">
          {{$item->user->name}}
        </div>
        <div class="card-body">
           <p class="card-text">{!!$item->content!!}</p>
           <img src="{{$item->image}}" class="card-img-top" alt="">
        </div>
        @auth
        @if (Auth::user()->id == $item->user_id)
            <div class="row my-2 p-2">
                <div class="col">
                    <a href="/jawaban/{{$item->id}}/edit" class="btn btn-info btn-block btn-sm">Edit</a>
                </div>
                <div class="col">
                    <form action="/jawaban/{{$item->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger btn-block btn-sm" value="Delete" onclick="return confirm('Do you really want to delete this answer?')">
                    </form>
                </div>
            </div>
        @endif
        @endauth       
    </div>
    @empty
        <h4>No Answer</h4>    
    @endforelse

    @auth
    <form action="/jawaban/{{$pertanyaan->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" placeholder="Fill in your answer..." @error('content') is-invalid @enderror" cols="30" rows="10"></textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
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
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    @endauth

@endsection