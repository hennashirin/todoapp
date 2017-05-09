<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use Auth;
use App\User;
use Carbon\Carbon;

class TasksController extends Controller
{
	protected $rules = [
		'name' => ['required', 'min:3'],
		'slug' => ['required'],
		'description' => ['required'],
		'assignee_id'=>['required',],
		
	];

    public function show(Project $project, Task $task)
	{
		return view('tasks.show', compact('project', 'task'));
	}

    public function create(Project $project)
	{
		$users = User::pluck('name', 'id')->all();
		return view('tasks.create', compact('project', 'users'));
	}

	public function edit(Project $project, Task $task)
	{
		$users = User::pluck('name', 'id')->all();
		return view('tasks.edit', compact('project', 'task','users'));
	}
    public function store(Project $project,Request $request)
	{
		// return $request->all();
		$this->validate($request, $this->rules);
		$input = $request->all();
		$input['project_id'] = $project->id;
		$input['user_id']=Auth::user()->id;
		$input['completion_date'] = Carbon::createFromFormat('d/m/Y', $input['completion_date'])->toDateString();
		Task::create( $input );
	    
		return redirect()-> route('projects.show', $project->slug)->with('message', 'Task created.');
	}
	public function update(Project $project,Task $task, Request $request)
	{
		$this->validate($request, $this->rules);
		$input = array_except($request->all(), '_method');
		$input['completion_date'] = Carbon::createFromFormat('d/m/Y', $input['completion_date'])->toDateString();
		$task->update($input);
	
		return Redirect()->route('projects.show', [$project->slug])->with('message', 'Task updated.');
	}
	public function destroy(Project $project, Task $task,Request $request)
	{
		$task->delete();
	
		return Redirect()->route('projects.show', $project->slug)->with('message', 'Task deleted.');
	}
 	
}
