<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\Task;

class UsersController extends Controller
{

      public function __construct() {
            // $this->middleware('can:change-password,user', ['only' => ['update']]);
      }

      public function index()
      {
            $users = User::orderBy('id','desc')->get();
            return view('users.index', compact('users'));
      }
    
 	public function edit(User $user)
	{
		return view('users.edit', compact('user'));
	}
      public function show(User $user)
	{
		return view('users.show', compact('user'));  
            
	}
      public function update(User $user,Request $request)
	{
            if(Auth::user()->can('change-password', $user)) {
            $this->validate($request, [
            'password' => 'required|min:6|confirmed'
                  ]);
                  $user->update(['password' => bcrypt($request->password)]);

                  return Redirect()->route('users.index', $user->id)->with('message', 'password updated.');
                  } else {
                        return redirect()->back()->withErrors('You are not authorised to do this action');
                  }
      
      }
	public function destroy(User $user,Request $request)
	{
		$user->delete();
 
		return Redirect()->route('users.index')->with('message', 'User deleted.');
	}
 	
      
      // public function register(Request $request)
      // {
      //       $data= $request->only('name','email','password');
      //       $data['password']=bcrypt( $data['password']);
      //       User::create($data);
           
	// 	return redirect()-> route('projects.index')->with('message', 'Account created.');
      //         return back()->withErrors('Registration failed');
      // }
      // public function login(Request $request)
      // {
      //       $data=$request->only('email','password');
      //       //$data['password']=bcrypt($data['password']);
      //       if(Auth::attempt($data))
      //       {
      //             return redirect()-> route('projects.index')->with('message','logged in');
                  
      //       }
      //       return back()->withErrors('Authorization failed');
      // }

      public function changeName(User $user, Request $request) {
      
            $user->name = $request->name;
            $user->update();
            return Redirect()->route('users.index', $user->id)->with('message', 'Name updated.');
      }
      public function myTask(Request $request){
            $user=Auth::user();
            $tasks=Task::where('assignee_id',$user->id)->get();
            return view('users.mytask', compact('tasks'));

      }
 
      
      }

