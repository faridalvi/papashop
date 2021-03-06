@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">View All</h1>
        <div class="card mb-4">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
                @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
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
                                    <th>Image</th>
                                    @if(Auth::user()->can('product-edit') || Auth::user()->can('product-delete'))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SN #</th>
                                    <th>Name</th>
                                    <th>Mart Name</th>
                                    <th>Image</th>
                                    @if(Auth::user()->can('product-edit') || Auth::user()->can('product-delete'))
                                    <th>Action</th>
                                    @endif
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
                                            <img src="{{asset('public/storage/image/'.$product->image)}}" height="50px" width="50px">
                                        </td>
                                        @if(Auth::user()->can('product-edit') || Auth::user()->can('product-delete'))
                                        <td>
                                            @can('product-edit')
                                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('product-delete')
                                                <form style="display: inline" onsubmit="return confirm('Do you really want to delete?');" action="{{ route('product.destroy',$product->id) }}" method="POST" >
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endcan
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection
