<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Notifications\UserUpdated;
  
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           
        $users = User::all();
        return view('users.index', compact('users'));
    }     
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }          

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',   
            'email' => 'required|string|max:255|email|unique:users,email,'.$id,
           ]);         
                       
        if ($validator->fails()) {
            return redirect('/users/'.$id.'/edit')
                   ->withErrors($validator)
                   ->withInput();
        }else{
         $user = User::find($id);     
         $user->name = $request->name;   
         $user->email = $request->email;
         $user->save();        
         $user->notify(new UserUpdated($user));
         $request->session()->flash('message.level', 'success');
         $request->session()->flash('message.content', 'The changes were updated successfully.');
              
        return redirect('home');
        }

    }      

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {                 
        $user = User::find($id);
        $user->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'The user: '.$user->email.' has been removed.');
        return redirect()->back();
    }   
}
