

<!-- /resources/views/projects/index.blade.php -->
@extends('layout')
 
@section('content')
<div class="container">

    <h2 style="margin-bottom:1em;">Projects</h2>
 
    @if ( !$projects->count() )
        You have no projects
    @else
        <table class="table table-striped table-bordered">
            <tr>
                <th>Project Name</th>
                <th>Tasks</th>
                <th>Status</th>
                <th>Created At</th>
                 <th>Created By</th>
                <th></th>
            </tr>
            
            @foreach( $projects as $project )
                <tr>
                 <td>
                  <a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>
                 </td>
                 <td>
                  {{ $project->tasks->count() }}
                 </td>
                 <td>
                    <div class="progress">
                         <div class="progress-bar" style="width:{{$project->progress()}}%;">
                    </div>
                    </div>
                 </td>
                 <td>
                    <span title="{{$project->created_at}}" data-toggle="tooltip">{{$project->created_at->diffForHumans()}}</span>
                
                 </td>
                 <td>
                    {{$project->user->name or ""}}
                
                 </td>
                 
                
                 <td>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug))) !!}
                       
                        
                            <a href="{{route('projects.edit',  $project->slug) }}" class="btn btn-info">Edit</a>
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        
                    {!! Form::close() !!}
                    </td>
                    
                    </tr>
            @endforeach
        </table>
    @endif
 
    <p>
        <a href="{{route('projects.create') }}">Create project</a>
    </p>
    </div>
@endsection
@section('scripts')

    <script>
        $('form').on('submit', function(e) {
            return confirm('Are you sure?');
        });
    </script>
@endsection