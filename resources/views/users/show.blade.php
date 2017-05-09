@extends('layout')
@section('content')
<div class="container">
    <h2 style="margin-bottom:1em;">Edit Name</h2>
    <ol class="breadcrumb">
    <li><a href="{{route('users.index')}}">users</a></li>
    <li class="active">{{$user->name}}</li>
    </ol>
    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/users/'.$user->id.'/change-name','class' => 'form-horizontal']) !!}
    <div class="col-md-6">
        <div class="form-group">
        <!--<label class="col-md-4 control-label" for="name">Name</label>-->
            {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
            {!! Form::text('name',Auth::user()->name, ['class' => 'form-control']) !!}
            </div>
            <input type="hidden" name="foo" value="bar" />
        </div>

    
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-success" >Save Name</button>  
            </div>
        </div>
    

    </div>
    
    {!! Form::close() !!}
</div>
@endsection