@extends('layouts.front')

@section('content')
    <div class="container mt-4">
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
        @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
        <form action="{{route('store-customer')}}" method="post">
            @csrf
            <div class="row">
                <input type="hidden" name="product_id" value="{{ request()->id }}">


                <div class="col-sm-6">
                    <div class="form-group">
                        <lable>Name</lable>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <lable>Email</lable>
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <lable>Phone</lable>
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <lable>Address</lable>
                        <input type="text" name="address" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
