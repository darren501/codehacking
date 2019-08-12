<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Hash;


class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all('id', 'name');
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        $input = null;

        if($request->password == ""){
            $input =  $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name); //move file to images folder and give it a name
            
            $photo = Photo::create(['file' => $name]);
            
            $input['photo_id'] = $photo->id;  //store photo id;
        }


        User::create($input);
        Session::flash('user_created', 'Success: User has been created!');
        
        return redirect('/admin/users');
        //return $request->all();
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
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::all('id', 'name');
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
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
        /**
         * Validation added here to check for email addresses that don't belong to the current 
         * update id. Cannot do this in request class because controller executes validation before 
         * it enters to the rest of the variable of the form
         */
        $input = null;

        if($request->password == ""){
            $input =  $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        $user = User::find($id);

        $this->validate($request, [
            //
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:5',
            'is_active' => 'required',
            'role_id' => 'required',
        ]);



        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);


            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }


        $user->update($input);

        Session::flash('user_edited', 'Success: User has been edited!');

        return redirect('/admin/users');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user= User::findOrFail($id);

        unlink(public_path() . $user->photo->file);

        $user->delete();
        
        Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/users');
    }
}
