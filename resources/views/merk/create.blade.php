@extends('layouts.admin')
@section('title') Create Merk @endsection
@section('content')
<div class="col-md-12">
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('merk.store')}}" method="POST">
    @csrf
    <label>Nama Merk</label><br>
    <input type="text" class="form-control" name="nama">
    <br>
    <input type="submit" class="btn btn-primary" value="Save">
</form>
</div>
@endsection
