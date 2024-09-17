<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{
    /**************Initialize Todos Service *****************/
    protected $todoService;
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**************Get Todos List *****************/
    public function index(Request $request)
    {
        $todos = $this->todoService->index($request);
        return view('dashboard.todos.index', compact('todos'));
    }
    /************** End *****************/

    /**************Create Todos List *****************/
    public function create()
    {
        return view('dashboard.todos.create');
    }
    /************** End *****************/

    /**************Store Todos List *****************/
    public function store(TodoRequest $request)
    {
        try {
            $this->todoService->store($request);
            Session::flash('success','Todo Created Successfully....');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Session::flash('error',$exception);
            return redirect()->back();
        }
    }
    /************** End *****************/

    /**************Edit Todos List *****************/
    public function edit(Todo $todo)
    {
        return view('dashboard.todos.edit', compact('todo'));
    }
    /************** End *****************/

    /**************update Todos List *****************/
    public function update(TodoRequest $request, Todo $todo)
    {
        try {
            $this->todoService->update($request,$todo);
            Session::flash('success','Todo Updated Successfully....');
            return redirect()->back();
        }catch (\Exception $exception)
        {
            Session::flash('error',$exception);
            return redirect()->back();
        }
    }
    /************** End *****************/

    /**************delete Todos List *****************/
    public function destroy(Todo $todo)
    {
        try {
            $this->todoService->destroy($todo);
            return response()->json(['success'=>true]);
        }catch (\Exception $exception)
        {
            return response()->json(['success'=>false]);
        }
    }
    /************** End *****************/


    /**************Quick completed status Todos List*****************/
    public function quickCompletedChangeStatus(Request $request,$id)
    {
        try {
            $todo = $this->todoService->quickCompletedChangeStatus($request,$id);
            return response()->json(['success'=>true, 'completed' => $todo->completed]);
        }catch (\Exception $exception)
        {
            return response()->json(['success'=>false]);
        }
    }
    /************** End *****************/

}
