@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">View All</h1>
        <div class="card mb-4">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
{{--            <div class="card-header"><i class="fas fa-table mr-1"></i>All Marts</div>--}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SN #</th>
                                    <th>Name</th>
                                    <th>Mart Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SN #</th>
                                    <th>Name</th>
                                    <th>Mart Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>
                                            @foreach($product->marts as $productMarts)
                                                {{$productMarts->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <form style="display: inline" onsubmit="return confirm('Do you really want to delete?');" action="{{ route('product.destroy',$product->id) }}" method="POST" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection
