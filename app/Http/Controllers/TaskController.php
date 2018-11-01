<?php

namespace App\Http\Controllers;

use App\Task;
use Validator;
use App\Http\Requests\RequestTasks;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\Paginator;


class TaskController extends Controller
{    
    public function index()
    {
        $tasks = Task::latest()->paginate(9);

        //$descript = Task::paginate(5);
        //$tasks = Task::orderBy('created_at')->get();
        
        return view('tasks', compact('tasks'));
        //return view('tasks', [ 'tasks' => $tasks ]);        
    }
    
    public function create()
    {
        /*$tasks = Task::orderBy('created_at')->get();*/
        return redirect()->action('TaskController@index');   
    }
    
    public function store(RequestTasks $request)
    {       
        try {
            request()->validate([
                'name' => 'required',
                'descript' => 'required',
            ]);
            Task::create($request->all());

            return redirect()->action('TaskController@create');
        } catch (Exception $e) {
            return trans('message.error');
        }
    }
    
    public function show($id)
    {                
    }
   
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('edit', compact('task'));       
    }
    
    public function update(RequestTasks $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        //return redirect()->action('TaskController@create');
        return redirect()->route('tasks.index')->with('success','Task updated successfully');        
    }
    
    public function destroy($task)
    {
        try {
        $result = Task::findOrFail($task);
        $result->delete();
        } catch (ModelNotFoundException $exception) {
            return trans('message.notexist') . $task;
        }
                    
        return redirect()->action('TaskController@index')->with('success','Post deleted successfully');       
    }
}
