@extends('layout')
 
@section('content')
<div class="container">
    <h2 style="margin-bottom:1em;">Edit Project</h2>
 <ol class="breadcrumb">
  <li><a href="{{route('projects.index')}}">Projects</a></li>
  <li class="active">{{$project->name}}</li>
</ol>
    {!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->slug],'class' => 'form-horizontal']) !!}
     <div class="col-md-6">
     @include('projects/partials/_form', ['submit_text' => 'Save Changes'])
     </div>
    {!! Form::close() !!}
    </div>
@endsection