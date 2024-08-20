@extends('layouts.master')

@section('judul1')
    CATEGORY
@endsection

@section('judul2')
    CATEGORY
@endsection

@push('scripts')
    <script src="/template/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@section('content')
@auth
<a href="/kategori/create" class="btn btn-primary btn-sm mb-3">Add Category</a>
@endauth
<table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($kategori as $key => $value)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$value->name}}</td>
            <td>
                <form action="/kategori/{{$value->id}}" method="POST">
                    @csrf
                    <a href="/kategori/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                    @method('DELETE')
                    @auth
                    <a href="/kategori/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Do you really want to delete this category?');">
                    @endauth
                </form>
            </td>
        </tr>
      @empty
        <tr>
            <td>No Category Data</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection