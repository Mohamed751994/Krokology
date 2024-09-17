<?php

namespace App\Services;

use App\Models\Todo;
use App\Traits\AttachmentTrait;
use Illuminate\Support\Facades\DB;

class TodoService
{
    use AttachmentTrait;

    public int $paginate_number = 20;

    /**************Get Todos List*****************/
    public function index($request)
    {
        $query = auth()->user()->todos();
        if ($request->title) {
            $query->where('title', 'LIKE','%'.$request->title.'%');
        }
        if ($request->completed) {
            $completed = $request->completed == 'true' ? 1 : 0;
            $query->whereCompleted($completed);
        }
        return $query->paginate($this->paginate_number)->withQueryString();
    }
    /**************end Get Todos List*****************/


    /**************store Todos List*****************/
    public function store($request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadRequestFile('Todo',$request, 'image');
        }
        return auth()->user()->todos()->create($data);
    }
    /**************end store Todos List*****************/


    /**************update Todos List*****************/
    public function update($request,$todo)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadRequestFile('Todo',$request, 'image');
        }
        if($todo->user_id !== auth()->user()->id)
        {
            return false;
        }
        $data['completed'] = isset($data['completed']) ? 1 : 0;
        $todo->update($data);
        return $todo;
    }
    /**************end update Todos List*****************/

    /**************delete Todos List*****************/
    public function destroy($todo)
    {
        if($todo->user_id !== auth()->user()->id)
        {
            return false;
        }
        $todo->delete();
    }
    /**************end delete Todos List*****************/


    /**************Quick completed status Todos List*****************/
    public function quickCompletedChangeStatus($request,$id)
    {
        $todo = Todo::findOrFail($id);
        if($todo->user_id !== auth()->user()->id)
        {
            return false;
        }
        $todo->update(['completed' => ($request->completed ? 0 : 1)]);
        return $todo;
    }
    /**************end delete Todos List*****************/

}
