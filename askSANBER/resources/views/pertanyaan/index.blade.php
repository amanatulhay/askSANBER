@extends('layouts.master')

@section('judul1')
    Questions
@endsection

@section('judul2')
    List of Questions
@endsection

@section('content')
@auth
<a href="/pertanyaan/create" class="btn btn-primary btn-sm mb-4">Add Your Question</a>
@endauth
<div class="row">
    @forelse ($pertanyaan as $item)
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-primary">{{$item->title}}</h5>
                    <span class="badge badge-info"> {{$item->kategori->name}}</span>
                     <p class="card-text">{!!Str::limit($item->content, 100)!!}</p>
                     <img src="{{$item->image}}" height="250px" class="card-img-top mb-4" alt="">
                     <p>Asked by: {{$item->user->name}}</p>
                    <a href="/pertanyaan/{{$item->id}}" class="btn btn-secondary btn-block btn-sm">Read More / Drop Your Answer</a>
                    @auth
                    @if (Auth::user()->id == $item->user_id)
                        <div class="row my-2">
                            <div class="col">
                                <a href="/pertanyaan/{{$item->id}}/edit" class="btn btn-info btn-block btn-sm">Edit</a>

                            </div>
                            <div class="col">
                                <form action="/pertanyaan/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger btn-block btn-sm" value="Delete" onclick="return confirm('Do you really want to delete this question?')">
                                </form>
                            </div>
                        </div>
                    @endif
                    @endauth
                </div>
            </div>

        </div>
    @empty
        <h2>No Question</h2>
    @endforelse

</div>

@endsection