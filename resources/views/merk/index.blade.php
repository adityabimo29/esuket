@extends('layouts.admin')
@section('title') Merk list @endsection
@section('content')
    @if(session('status'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning">
                {{session('status')}}
            </div>
        </div>
    </div>
    @endif
<div class="col-md-6 mb-4">
    <form action="{{route('merk.index')}}">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Filter by category name" name="name">
            <div class="input-group-append">
                <input type="submit" value="Filter" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<hr class="my-3">
<div class="col-md-12">
    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th><b>No</b></th>
                <th><b>Nama</b></th>
                <th><b>Actions</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $row)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$row->nama}}</td>
                <td>
                    <a href="{{route('merk.edit', [$row->id])}}" class="btn btn-info btn-sm"> Edit </a>
                    <form class="d-inline" action="{{route('merk.destroy', [$row->id])}}" method="POST"
                        onsubmit="return confirm('Move category to trash?')">
                        @csrf
                        <input type="hidden" value="DELETE" name="_method">
                        <input type="submit" class="btn btn-danger btn-sm" value="Trash">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colSpan="10">
                    {{$data->appends(Request::all())->links()}}
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection