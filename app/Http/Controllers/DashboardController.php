<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayUsers(){
        $isAdmin = auth()->user()->user_type;
        if($isAdmin==0){
            $users = User::all();
            return view('dashboard.allusers')->with('users',$users);
        }else{
            return redirect('/home');
        }
        
    }

    public function editUserInfo($id){
        $loggedinId = auth()->user()->id;
        if($id == $loggedinId){
            $user = User::findOrFail($id);
            return view('dashboard.edituser')->with('user',$user);
        }else{
            return redirect('/home');
        }
    }

    public function updateUserInfo(Request $request,$id){
        $loggedinId = auth()->user()->id;
        if($id == $loggedinId){
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email:rfc,dns|max:255',
                'mobile_no' => 'required|numeric|min:10,max:10',
                'country' => 'required|string|max:20',
                'state' => 'required|string|max:20',
                'city' => 'required|string|max:20',
                'pincode' => 'required|numeric|min:6,max:10',
                'status' => 'required|numeric',
                'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()]);
            } else {
                $user = User::find($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->mobile_no = $request->input('mobile_no');
                $user->country = $request->input('country');
                $user->state = $request->input('state');
                $user->city = $request->input('city');
                $user->pincode = $request->input('pincode');
                $user->status = $request->input('status');
                if($request->file('image')){
                    $image = $request->file('image');
                    $imageName = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
                    $image->move('./storage/profileImages/', $imageName); 
                    $user->image = $imageName;
                }
                $user->save();
                return redirect('/display-users')->with('status','User Updated Successfully');
            }
        }else{
            return redirect('/home');
        }
    }

    public function displayUserInfo($id){
        $user = User::findOrFail($id);
        return view('dashboard.displayuser')->with('user',$user);
    }
}
