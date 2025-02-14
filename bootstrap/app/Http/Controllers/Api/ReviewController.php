<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;


use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    use ApiResponseTrait;

    public function index(){

        $review = ReviewResource::collection(Review::get());
        return $this->apiResponse($review,'ok',200);
    }

    public function show($id){

        $review = review::find($id);

        if($review){
            return $this->apiResponse(new ReviewResource($review),'ok',200);
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

        $review = review::create($request->all());

        if($review){
            return $this->apiResponse(new reviewResource($review),'The post Save',201);
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

        $review=review::find($id);

        if(!$review){
            return $this->apiResponse(null,'The post Not Found',404);
        }

        $review->update($request->all());

        if($review){
            return $this->apiResponse(new ReviewResource($review),'The post update',201);
        }


    }
    public function destroy($id){

        $review=review::find($id);

        if(!$review){
            return $this->apiResponse(null,'The post Not Found',404);
        }

        $review->delete($id);
        

        if($review){
            return $this->apiResponse(null,'The post deleted',200);
        }

    }
}
