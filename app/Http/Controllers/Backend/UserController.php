<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
       return view("backend.users.index", ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("backend.users.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request-> get("name");
        $email = $request->get("email");
        $password = $request->get("password");
        $is_active = $request->get("is_active", 0);
        $is_admin = $request->get("is_admin",0 );


 // Aldığımız Bilgiler İle Yeni User Oluşturuldu
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->is_admin = $is_admin;
        $user->is_active= $is_active;
 // Oluşturduğumuz User Kaydedildi
        $user->save();
      return redirect()->route('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return "show";
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
      return view("backend.users.update_form",["user"=>$user]);
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
           $name = $request-> get("name");
           $email = $request->get("email");
           $is_active = $request->get("is_active", 0);
           $is_admin = $request->get("is_admin",0 );

           $user = User::find($id);
           $user->name = $name;
           $user->email = $email;
           $user->is_admin = $is_admin;
           $user->is_active= $is_active;
           $user->save();
          return redirect()->route('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "destroy";
    }
}
