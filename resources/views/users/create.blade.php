@extends('layouts.master')


@section('content')
   <div class="container mt-4">
       <div class="row">
           <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                   <h2>Create New User</h2>
               </div>
           </div>
       </div>


       @if (count($errors) > 0)
           <div class="alert alert-danger">
               <strong>Whoops!</strong> There were some problems with your input.<br><br>
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif



       <form action="{{route('users.store')}}" method="post">
           @csrf
           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Name:</strong>
                       <input type="text" name="name" class="form-control">
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Email:</strong>
                       <input type="email" name="email" class="form-control">
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Password:</strong>
                       <input type="password" name="password" class="form-control">
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Confirm Password:</strong>
                       <input type="password" name="confirm-password" class="form-control">
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Role:</strong>
                       <select name="roles[]" id="" class="form-control">
                           <option value="0" disabled>Please Select</option>
                           @foreach($roles as $role)
                               <option value="{{$role->id}}">{{$role->name}}</option>
                           @endforeach
                       </select>
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                   <button type="submit" class="btn btn-primary">Submit</button>
               </div>
           </div>
       </form>
   </div>
@endsection
