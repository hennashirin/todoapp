@extends('layout')
 
@section('content')
    <div class="container">
    <h2 style="margin-bottom:1em;">Create Project</h2>
    <ol class="breadcrumb">
  <li><a href="{{route('projects.index')}}">Projects</a></li>

  <li class="active">Create new project</li>
</ol>
 
    {!! Form::model(new App\Project, ['route' => ['projects.store'], 'class' => 'form-horizontal']) !!}
        <div class="col-md-6">
        @include('projects/partials/_form', ['submit_text' => 'Create Project'])
        </div>
    {!! Form::close() !!}
    </div>
@endsection
