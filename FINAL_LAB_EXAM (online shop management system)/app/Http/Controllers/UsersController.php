<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $req)
    {
        return view('users.login');
    }
    public function verifyLogin(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);

        $user = Users::where('username', $req->username)
                    ->where('password', $req->password)
                    ->first();
        
        if($user){
            $req->session()->put('profile',$user);
            if($user->role =='admin'){
                return redirect()->route('users.admin.home');
            }else{
                // return redirect()->route('users.employee.home');
            }
        }
        else{
            $req->session()->flash('msg','Wrong username or password.');
            $req->session()->flash('type','danger');            
            return redirect()->back();
        }
    }

    public function adminHome()
    {   $allUsers=Users::all();
        return view('users.adminHome')->with('allUsers',$allUsers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('users.usersCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'username' => 'required',
            'contactno' => 'required',
            'role' => 'required',
            'password'=> 'required'
        ]);

        $user = new Users();
        $user->name         = $req->name;
        $user->username     = $req->username;
        $user->password     = $req->password;
        $user->contactno    = $req->contactno;
        $user->role         = $req->role;
        $user->save();
       
        $req->session()->flash('msg','User added successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('users.admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $user = Users::find($id);
        return view('users.usersEdit', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'username' => 'required',
            'contactno' => 'required',
            'role' => 'required',
            'password'=> 'required'
        ]);

        $user = Users::find($id);
        $user->name         = $req->name;
        $user->username     = $req->username;
        $user->password     = $req->password;
        $user->contactno    = $req->contactno;
        $user->role         = $req->role;
        $user->save();

        $req->session()->flash('msg','User updated successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('users.admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $req)
    {
        Users::find($id)->delete();
        $req->session()->flash('msg','User deleted successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('users.admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {   $key = $req->get('key');
        if($req->ajax()){
            $allUsers=Users::where('name','like', '%'.$key.'%')->get();

            echo json_encode($allUsers);    
        }
    }
}
