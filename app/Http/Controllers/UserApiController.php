<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;


class UserApiController extends Controller
{
    public function ShowUser($id=null){
        if($id==''){
            $users = User::get();
            return response()->json(['users'=>$users],200);
        }else{
            $users = User::find($id);
            return response()->json(['users'=>$users],200);
        }
    }

    public function AddUser(Request $request){
        $userss = $request->all();
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
        $validator = Validator::make($userss,$rules,$custom_msg);
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
}
