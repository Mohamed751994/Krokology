<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\User;
use App\Services\TodoService;
use App\Traits\AttachmentTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestTodoController extends Controller
{
    use AttachmentTrait;

    /**************Store Test Todos List *****************/
    public function store(TodoRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = User::first()->id;
        Todo::create($data);
        Session::flash('success','Todo Created Successfully....');
        return redirect()->back();
    }
    /************** End *****************/

}
