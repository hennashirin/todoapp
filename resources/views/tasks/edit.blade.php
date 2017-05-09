@extends('layout')
 
@section('content')
<div class="container">

     <h2 style="margin-bottom:1em;">Edit Task "{{ $task->name }}"</h2>
     <ol class="breadcrumb">
        <li><a href="{{route('projects.index')}}">Projects</a></li>
        <li><a href="{{route('projects.show',$project)}}">{{$project->name}}</a></li>
       
        <li class="active">{{$task->name}}</li>
    </ol>
     
    
    {!! Form::model($task, ['method' => 'PATCH', 'route' => ['projects.tasks.update', $project->slug, $task->slug],'class'=>'form-horizontal col-md-6']) !!}
        
        @include('tasks/partials/_form', ['submit_text' => 'Save Changes'])
      
    {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(function(){
    $('#date').daterangepicker({
        singleDatePicker:true,
        showDropdowns:true,
        locale: {
            format: 'DD/MM/YYYY'
        }
    });
  });
</script>
@endsection
