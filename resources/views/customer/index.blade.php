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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Product Details</th>
                                    @if(Auth::user()->can('mart-edit') || Auth::user()->can('mart-delete'))
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SN #</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Product Details</th>
                                    @if(Auth::user()->can('mart-edit') || Auth::user()->can('mart-delete'))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>
                                        @foreach($customer->products as $product)

                                        {{$product->name}}

                                        <img src="{{asset('public/storage/image/'.$product->image)}}" width="50px" class="ml-2">
                                        @endforeach
                                        </td>
                                        @if(Auth::user()->can('mart-edit') || Auth::user()->can('mart-delete'))
                                        <td>
                                            @can('mart-delete')
                                            <form style="display: inline" onsubmit="return confirm('Do you really want to delete?');" action="{{ route('customer.destroy',$customer->id) }}" method="POST" >
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
