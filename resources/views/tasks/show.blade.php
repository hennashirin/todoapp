@extends('layout')
 
@section('content')
<div class="container">
    <h2>
          <a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a> -
        {{ $task->name }}
    </h2>
        <ol class="breadcrumb">
           <li><a href="{{route('projects.index')}}">Projects</a></li>
            <li><a href="{{route('projects.show',$project)}}">{{$project->name}}</a></li>
            
            <li class="active">{{$task->name}}</li>
            
         </ol>
 
    {{ $task->description }}
    </div>
@endsection