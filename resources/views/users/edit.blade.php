@extends('layout')
@section('content')
<div class="container">
    <h2 style="margin-bottom:1em;">Edit Password</h2>
    <ol class="breadcrumb">
    <li><a href="{{route('users.index')}}">users</a></li>
    <li class="active">{{$user->name}}</li>
    </ol>
    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id],'class' => 'form-horizontal']) !!}
    <div class="col-md-6">
        <div class="form-group">
        <!--<label class="col-md-4 control-label" for="name">Name</label>-->
            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
            {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Password Confirmation', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
            {!! Form::password('password_confirmation',['class' =>'form-control'])!!}
            
            </div>
            
        </div>  
    
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-success" >Save Password</button>  
            </div>
        </div>
    

    </div>
    
    {!! Form::close() !!}
</div>  
@endsection