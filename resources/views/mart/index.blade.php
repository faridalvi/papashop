@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">View All</h1>
        <div class="card mb-4">
{{--            <div class="card-header"><i class="fas fa-table mr-1"></i>All Marts</div>--}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SN #</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SN #</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($marts as $mart)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$mart->name}}</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
