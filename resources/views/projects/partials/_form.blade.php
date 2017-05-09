<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-8">
    {!! Form::text('name' ,isset($project)?$project->name:null, ['class' => 'form-control'])!!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:' , ['class' => 'col-md-4 control-label'])!!}
    <div class="col-md-8">
    {!! Form::text('slug',isset($project)?$project->slug:null,['class' =>'form-control'])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
    {!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
    </div>
</div>