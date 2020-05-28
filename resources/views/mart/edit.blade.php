@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4 border-bottom">Edit</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        <form action="{{route('mart.update',$mart->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$mart->name}}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" cols="30" rows="10" class="form-control">
                    {{$mart->description}}
                </textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update">
            </div>
        </form>
    </div>
@endsection
