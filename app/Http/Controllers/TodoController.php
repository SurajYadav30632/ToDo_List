<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller{

    private $TodoService;

    public function __construct(TodoService $todoService){
        $this->TodoService = $todoService;        
    }
    
    public function index(Request $request){
        try{ 
            $tasks = $this->TodoService->getList();
            return view('Todo.index',compact('tasks'));
        }catch(Exception $e){
            return json_encode(['code'=>500,'error'=>$e->getMessage()]);
        }
    }

    public function add(Request $request){
        $request->validate([
            'task'=>'required|unique:todos|max:100'
        ]);

        try{
            $response = $this->TodoService->addTask($request->all());
            return json_encode($response);
        }catch(Exception $e){
            return json_encode(['code'=>500,'error'=>$e->getMessage()]);
        }
    }

    public function delete(Request $request){
        $request->validate([
            'id'=>'required'
        ]);
        try{
            $response = $this->TodoService->deleteTask($request->all()['id']);
            return json_encode($response);
        }catch(Exception $e){
            return json_encode(['code'=>500,'error'=>$e->getMessage()]);
        }
    }

    public function edit(Request $request){
        $request->validate([
            'id'=>'required'
        ]);
        try{
            $response = $this->TodoService->updateTaskAsCompleted($request->all()['id']);
            return json_encode($response);
        }catch(Exception $e){
            return json_encode(['code'=>500,'error'=>$e->getMessage()]);
        }
    }
}
