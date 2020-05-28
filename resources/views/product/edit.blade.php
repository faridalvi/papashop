@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4 border-bottom">Add New</h1>
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

        <form action="{{route('product.update',$product->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label>Mart</label>
                <select name="mart" class="form-control">
                    <option value="0" disabled>Please Select</option>
                    @foreach($marts as $mart)
                        <option value="{{$mart->id}}"
                            @foreach($product->marts as $productMarts)
                                @if($productMarts->id == $mart->id)
                                    selected
                                @endif
                            @endforeach
                        >{{$mart->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" cols="30" rows="10" class="form-control">
                    {{$product->description}}
                </textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Update">
            </div>
        </form>
    </div>
@endsection
