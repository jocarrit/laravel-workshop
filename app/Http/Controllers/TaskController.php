<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Task;
use \validator;
use App\User;

class TaskController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Shows list of task for a user
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function index(Request $request)
	{
		//$task = Task::find(1);
		//tasks = Task::all();
		//$tasks = Task::orderBy('created_at', 'DESC')->get();
		//$tasks = Task::where('user_id', '=', $request->user()->id);
		$tasks = $request->user()->tasks()->get();

		return view('tasks')->with(['tasks' => $tasks]);
	}

	/**
	 * stores a new task
	 * @return [type] [description]
	 */
	public function store(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'name' => 'required|max:255'
			]);

		if ($validator->fails()) {
			return redirect('/')->withInput()->withErrors($validator);
		}

		// $request->user()->tasks()->create([
		// 	'name' => $request->name,
		// 	]);

		$task = new Task;

		$task->name = $request->name;
		$task->user_id = $request->user()->id;
		$task->save();

		return redirect('tasks');

	}

	/**
	 * destroys a task
	 * @return [type] [description]
	 */
	public function destroy(Request $request, Task $task)
	{
		//$task->delete();
		
		$task = Task::find($request->task->id);
		$task->delete();

		return redirect('tasks');
	}
    
}
