@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4 border-bottom">Dashboard</h1>
    <div class="row">
        <div class="col-md-12">
            Welcome {{Auth::user()->name}}
        </div>
    </div>
</div>
@endsection
