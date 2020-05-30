@extends('layouts.master')
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Users Management</h2>
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
                <th>Email</th>
                <th>Roles</th>
                @if(Auth::user()->can('user-edit') || Auth::user()->can('user-delete'))
                <th width="280px">Action</th>
                @endif
            </tr>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    @if(Auth::user()->can('user-edit') || Auth::user()->can('user-delete'))
                    <td>
                        @can('user-edit')
                        <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                        @endcan
                        <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                        @can('user-delete')
                        <form style="display: inline" onsubmit="return confirm('Do you really want to delete?');" action="{{ route('users.destroy',$user->id) }}" method="POST" >
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


        {!! $data->render() !!}
    </div>

@endsection
