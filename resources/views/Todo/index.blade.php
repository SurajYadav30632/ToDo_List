@extends('Layout.default')
@section('content')
    
    <div class="container">
        <h1>PHP - Simple To Do List App </h1>
        <div class="input-section">
            @csrf
            <input type="text" name = "task" id="task">
            <button class="add-task btn btn-primary">Add Task</button>
            <span class="invalid-feedback text-danger"></span>
        </div>
        <div class="task-section">
            <div class="task-header">
                <div class="tasks">
                    <div>
                        <span class="sequence">#</span>
                    </div>
                    <div>
                        <span class="task-name">Task</span>
                    </div>
                </div>
                <div class="task-status">
                    <div>
                        <span class="staus">Status</span>
                    </div>
                    <div>
                        <span class="action">Action</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-div">
        @foreach ($tasks as $task)
            <div class="task-section">
                <div class="task-header">
                    <div class="tasks">
                        <div>
                            <span class="sequence">{{$task['id'] ?? ""}}</span>
                        </div>
                        <div>
                            <span class="task-name">{{$task['task'] ?? ""}}</span>
                        </div>
                    </div>
                    <div class="task-status">
                        <div>
                            <span class="staus"><?=$task['status']==0?"":"DONE"?></span>
                        </div>
                        <div>
                            @if(!$task['status'])
                                <button title="Complete Task" class="edit btn btn-success" data-id="{{$task['id'] ?? ""}}" ><i class=" fa  fa-check"> </i></button>
                            @endif
                            <button title="Remove" class="delete btn btn-danger" data-id="{{$task['id'] ?? ""}}"> <i class="fa fa-trash"> </i></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach    
        </div>    
    </div>
@endsection
