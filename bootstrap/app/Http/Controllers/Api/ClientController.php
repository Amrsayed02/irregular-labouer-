<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;


use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    use ApiResponseTrait;

    public function index(){


        $posts = ClientResource::collection(Client::get());
        return $this->apiResponse($posts,'ok',200);
    }

    public function show($id){

        $post = Client::find($id);

        if($post){
            return $this->apiResponse(new ClientResource($post),'ok',200);
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

        $post = Client::create($request->all());

        if($post){
            return $this->apiResponse(new ClientResource($post),'The post Save',201);
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

        $post=Client::find($id);

        if(!$post){
            return $this->apiResponse(null,'The post Not Found',404);
        }

        $post->update($request->all());

        if($post){
            return $this->apiResponse(new ClientResource($post),'The post update',201);
        }


    }
    public function destroy($id){

        $post=Client::find($id);

        if(!$post){
            return $this->apiResponse(null,'The post Not Found',404);
        }

        $post->delete($id);

        if($post){
            return $this->apiResponse(null,'The post deleted',200);
        }

    }
}