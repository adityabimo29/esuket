@extends('layouts.admin')
@section('title') Edit Merk @endsection
@section('content')
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
    {{session('status')}}
    </div>
    @endif
    <form action="{{route('merk.update', [$data->id])}}" enctype="multipart/form-data" method="POST"
        class="bg-white shadow-sm p-3">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label>Category name</label> <br>
        <input type="text" class="form-control" value="{{$data->nama}}" name="nama">
        <br><br>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
</div>
@endsection