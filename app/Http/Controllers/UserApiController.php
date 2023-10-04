<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;


class UserApiController extends Controller
{
    //show single or multiple user
    public function ShowUser($id=null){
        if($id==''){
            $users = User::get();
            return response()->json(['users'=>$users],200);
        }else{
            $users = User::find($id);
            return response()->json(['users'=>$users],200);
        }
    }

    //add single user
    public function AddUser(Request $request){
        $users = $request->all();
        $rules = [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ];
        $custom_msg = [
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'email.email'=>'Email must be valid',
            'password.required'=>'Password is required',
        ];
        $validator = Validator::make($users,$rules,$custom_msg);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->email),
            ]);
            $message = 'User Created Successfully';
            return response()->json(['message'=>$message], 201);
    }

    //add multiple users by json
    public function AddMultipleUser(Request $request){
        $users = $request->all();        
        $rules = [
            'users.*.name'=>'required',
            'users.*.email'=>'required|email|unique:users',
            'users.*.password'=>'required',
        ];
        $custom_msg = [
            'users.*.name.required'=>'Name is required',
            'users.*.email.required'=>'Email is required',
            'users.*.email.email'=>'Email must be valid',
            'users.*.password.required'=>'Password is required',
        ];
        $validator = Validator::make($users,$rules,$custom_msg);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        foreach($users['users'] as $user){
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password']),
            ]);
        }    
            
            $message = 'User Created Successfully';
            return response()->json(['message'=>$message], 201);
    }
}
