<div class="form-group">
    <!--<label class="col-md-4 control-label" for="name">Name</label>-->
    {!! Form::label('name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::text('name', isset($task)?$task->name:null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::text('slug',isset($task)?$task->slug:null,['class' =>'form-control']) !!}
    </div>
</div>
 
<div class="form-group">
    {!! Form::label('completed', 'Completed:',['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8 checkbox">
        <label class="">
        {!! Form::hidden('completed',0) !!}
        {!! Form::checkbox('completed') !!}
        </label>
    </div>
</div>
 
<div class="form-group">
    {!! Form::label('description', 'Description:',['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::textarea('description',isset($task)?$task->description:null,['class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group" >
    {!! Form::label('assignee_id', 'Assign To:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::select('assignee_id', ['' => 'Select user'] + $users, isset($task) ? $task->assignee_id : null, ['class' =>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('completion_date', 'Due Date:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::text('completion_date', isset($task->completion_date) ? $task->completion_date->format('d/m/Y') : null, ['class' =>'form-control', 'id' => 'date']) !!}
    </div>
</div>
 

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
    {!! Form::submit($submit_text,['class' => 'btn btn-success'])!!}
    </div>
</div>