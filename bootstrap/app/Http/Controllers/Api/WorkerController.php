<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;


use App\Http\Resources\WorkerResourse;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkerController extends Controller
{
    use ApiResponseTrait;

    public function index(){

        $worker = WorkerResourse::collection(Worker::get());
        return $this->apiResponse($worker,'ok',200);
    }

    public function show($id){

        $worker = Worker::find($id);

        if($worker){
            return $this->apiResponse(new WorkerResourse($worker),'ok',200);
        }
        return $this->apiResponse(null,'The post Not Found',404);

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'description' => 'required|max:255',
            'photo' => 'required',
            'video' => 'required',
            
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $worker = Worker::create($request->all());

        if($worker){
            return $this->apiResponse(new WorkerResourse($worker),'The post Save',201);
        }

        return $this->apiResponse(null,'The post Not Save',400);
    }


    public function update(Request $request ,$id){

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $worker=Worker::find($id);

        if(!$worker){
            return $this->apiResponse(null,'The post Not Found',404);
        }

        $worker->update($request->all());

        if($worker){
            return $this->apiResponse(new WorkerResourse($worker),'The post update',201);
        }


    }
    public function destroy($id){

        $worker=Worker::find($id);

        if(!$worker){
            return $this->apiResponse(null,'The post Not Found',404);
        }

        $worker->delete($id);

        if($worker){
            return $this->apiResponse(null,'The post deleted',200);
        }

    }
}