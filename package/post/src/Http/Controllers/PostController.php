<?php

namespace Hussain\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        return view('post::post');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10|max:255',
            'content' => 'required|min:5|max:5000'
        ]);
    
        if ($validator->fails()) {
            return array(['errors' => $validator->errors(),'success'=>0]);
        }
    
        return array(['message' => 'success','success'=>1]);
    }
}
