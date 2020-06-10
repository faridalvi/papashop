@extends('layouts.front')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($marts as $mart)
                @if(count($mart->products) > 0)
                <div class="col-md-3 col-sm-4">
                        @foreach($mart->products as $product)
                            <div class="card">
                                <img class="card-img-top" src="{{asset('public/storage/image/'.$product->image)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">
                                        {{$product->description}}
                                    </p>
                                    <a href="{{route('create-customer',$product->id)}}" class="btn btn-primary btn-sm">Buy Now</a>
                                </div>
                            </div>
                        @endforeach
                </div>
                @else
                    <h3>{{$mart->name}} has no products</h3>
                @endif

            @endforeach
        </div>
    </div>
@endsection
