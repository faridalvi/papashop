@extends('layouts.master')


@section('content')
<div class="container-fluid mt-4">


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            @if(Auth::user()->can('role-edit') || Auth::user()->can('role-delete'))
                <th width="280px">Action</th>
            @endif
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                @if(Auth::user()->can('role-edit') || Auth::user()->can('role-delete'))
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        <form style="display: inline" onsubmit="return confirm('Do you really want to delete?');" action="{{ route('roles.destroy',$role->id) }}" method="POST" >
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></button>
                        </form>
                    @endcan
                </td>
                @endif
            </tr>
        @endforeach
    </table>


    {!! $roles->render() !!}
</div>

@endsection
