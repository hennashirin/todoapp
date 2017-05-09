
    @if ( !$tasks->count() )
        {{ $empty_message }}
    @else
        <table  class="table table-striped table-bordered">
            <tr>
                <th>Task Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Created By</th>
                <th>Assign To</th>
                <th>Completion Date</th>
                <th></th>
            
               
            </tr>
            
            @foreach( $tasks as $task )
                <tr>
                    <td>
                     <a href="{{ route('projects.tasks.show', [$task->project->slug, $task->slug]) }}">{{ $task->name }}</a>
                    </td>
                    <td>
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('completed','',$task->completed,['disabled'=>'']) !!} {{ $task->completed ? 'Completed' : 'Incomplete' }}
                            </label>
                        </div>
                    </td>
                     
                    <td>
                     <span title="{{$task->created_at}}" data-toggle="tooltip">{{$task->created_at->diffForHumans()}}</span>
                    </td>
                    <td>
                        {{ $task->user->name or "" }}
                    </td>
                    <td>
                        {{ $task->assignee->name or '' }}
                    </td>
                    <td>
                      {{ isset($task->completion_date) ? $task->completion_date->format('d/m/Y') : 'N/A' }}
                    </td>
                    
                    <td>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.tasks.destroy', $task->project->slug, $task->slug))) !!}
                        
                    
                            {!! link_to_route('projects.tasks.edit', 'Edit', array($task->project->slug, $task->slug), array('class' => 'btn btn-info')) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        
                    {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
 