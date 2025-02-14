<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;


use App\Http\Resources\JobResource;
use App\Models\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class jobController extends Controller
{
    use ApiResponseTrait;

    public function index(){

        $job = JobResource::collection(job::get());
        return $this->apiResponse($job,'ok',200);
    }

    public function show($id){

        $job = Job::find($id);

        if($job){
            return $this->apiResponse(new JobResource($job),'ok',200);
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

        $worker = Job::create($request->all());

        if($worker){
            return $this->apiResponse(new JobResource($worker),'The post Save',201);
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

        $Job=Job::find($id);

        if(!$Job){
            return $this->apiResponse(null,'The post Not Found',404);
        }

        $Job->update($request->all());

        if($Job){
            return $this->apiResponse(new JobResource($Job),'The post update',201);
        }


    }
    public function destroy($id){

        $job=Job::find($id);

        if(!$job){
            return $this->apiResponse(null,'The post Not Found',404);
        }

        $job->delete($id);
        

        if($job){
            return $this->apiResponse(null,'The post deleted',200);
        }

    }
}
