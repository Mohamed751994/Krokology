<form method="GET" action="{{route('todos.index')}}">
    <div class="row my-3 text-center">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" name="title" value="{{request('title')}}" placeholder="Search by title...">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <select name="completed" class="form-control form-select">
                    <option value="">Select Completed or Not...</option>
                    <option value="true" @selected(request('completed') == 'true')>Completed</option>
                    <option value="false" @selected(request('completed') == 'false')>Not Completed</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <button type="submit" class="btn btn-info text-white"><i class="fa fa-search mx-1"></i> Search</button>
            </div>
        </div>
    </div>
</form>
