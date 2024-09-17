<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Todos -> Edit -> #{{$todo->id}} - {{$todo->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row m-0 todo_row">
                    <div class="col-md-12">
                        @include('dashboard.components.messages')
                        <form method="post" action="{{route('todos.update', $todo->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-3">
                                <label for="title">Title <small class="text-danger">*</small></label>
                                <input type="text" class="form-control" name="title" value="{{$todo->title}}" id="title" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="description">Description <small class="text-dark">(optional)</small></label>
                                <textarea class="form-control" name="description" id="description">{!! $todo->description !!}</textarea>
                            </div>
                            <div class="form-group my-3">
                                <label for="image">Upload Attachment <small class="text-dark">(optional)</small></label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                @if($todo->image)
                                    <img src="{{$todo->getFileUrl($todo->image)}}" width="300" height="300">
                                @endif
                            </div>
                            <div class="form-group my-4 d-flex align-items-center">
                                <label for="completed">Completed</label>
                                <label class="switch custom mx-3">
                                    <input type="checkbox" value="{{$todo->completed}}" name="completed" @checked($todo->completed)>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group my-3">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
