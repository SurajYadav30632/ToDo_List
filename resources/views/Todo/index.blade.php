@extends('Layout.default')
@section('content')
    <style>
        .container {
            text-align: center;
        }
        h1{
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(137, 137, 219);
            text-align: center;
            border-bottom: 1px solid #ccc;
            display: inline-block;
        }
        .task-header {
            display: flex;
            justify-content: center;
            margin: 20px 0px;
            align-content: center;
        }
        .tasks {
            display: flex;
            width: 30%;
        }
        .task-status{
            display: flex;
        }
        span.sequence {
            padding: 0px 20px;
            margin: 0px 30px;
        }

        span.task-name {
            padding: 20px 40px;
        }

        span.staus {
            padding: 0 20px;
            margin: 0 20px;
        }
        .text-danger {
            display: inline-block;
        }
        .edit {
            margin-right: 5px;
        }
    </style>
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
