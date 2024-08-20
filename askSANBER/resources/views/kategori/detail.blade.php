@extends('layouts.master')

@section('judul1')
    DETAIL OF CATEGORY
@endsection

@section('judul2')
    DETAIL OF CATEGORY : {{$kategoriById->name}}
@endsection

@section('content')

    <div class="card-body">
        <h5>{{$kategoriById->name}}</h5>
        <p>{{$kategoriById->description}}</p>
       
        <br>
        <a href="/kategori" class="btn btn-secondary btn-block btn-sm">Kembali</a>
    </div>

@endsection