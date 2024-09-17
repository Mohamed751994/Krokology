<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Todos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row m-0 todo_row">
                    <div class="col-md-9 mx-auto">
                        @include('dashboard.components.messages')
                        <div class="create my-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_todo">
                                <i class="fa fa-plus mx-1"></i> Create
                            </button>
                        </div>

                        @include('dashboard.todos.search')
                       <table class="table table-hover table-bordered text-center">
                           <thead>
                                <th>#ID</th>
                                <th>Title</th>
                                <th>Completed</th>
                                <th>Actions</th>
                           </thead>
                           <tbody>
                           @forelse($todos as $todo)
                               <tr @if($todo->completed) class="completed" @endif>
                                   <td>#{{$todo->id}}</td>
                                   <td>{{$todo->title}}</td>
                                   <td>
                                       <label class="switch custom mx-3">
                                           <input type="checkbox" onchange="changeCompletedStatus(this)" data-id="{{route('todos.quickCompletedChangeStatus', $todo->id)}}" value="{{$todo->completed}}" name="completed" @checked($todo->completed)>
                                           <span class="slider round"></span>
                                       </label>
                                   </td>
                                   <td>
                                       <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-sm btn-dark" title="Edit"><i class="fa fa-edit"></i></a>
                                       <button type="button" class="btn btn-sm btn-danger" onclick="deleteTodo(this)" data-id="{{route('todos.destroy', $todo->id)}}" title="Delete"><i class="fa fa-remove"></i></button>
                                   </td>
                               </tr>
                           @empty
                               <tr>
                                   <td colspan="3">No Data Found</td>
                               </tr>
                           @endforelse
                           </tbody>
                       </table>
                    </div>
                    <div class="col-12 my-2">
                        {{$todos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.todos.modals.create')

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>

            {{--Delete SingleTodo--}}
            function deleteTodo(element) {
                swal({
                    title: "Are you sure ??",
                    text: '',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: $(element).data('id'),
                                type: 'DELETE',
                                data: {
                                    _method: 'DELETE'
                                },
                                success: function (data) {
                                    if(data.success)
                                    {
                                        swal("Todo Deleted Successfully...", {
                                            icon: "success",
                                        });
                                        $(element).parent().parent().remove();
                                    }
                                    else
                                    {
                                        swal("Something Error!", {
                                            icon: "error",
                                        });
                                    }

                                }
                            });
                        }
                    });
            }


            {{--change Completed Status--}}
            function changeCompletedStatus(element) {
                var value = $(element).attr('value');
                var url = $(element).data('id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'POST',
                    data: {
                        completed: value
                    },
                    success: function (data) {
                        if(data.success && data.completed)
                        {
                            $(element).parent().parent().parent().addClass('completed');
                            $(element).val(1);
                        }
                        else
                        {
                            $(element).parent().parent().parent().removeClass('completed');
                            $(element).val(0);
                        }

                    }
                });
            }
        </script>
    @endpush

</x-app-layout>
