@extends('layouts.front')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($marts as $mart)
                <div class="col-md-3 col-sm-4">
                    @foreach($mart->products as $product)
                        {{$product->name}}
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
@endsection
