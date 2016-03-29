<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Redirect;
use App\User;
use App\Profile;
use App\Events\UserWasCreated;
use App\Helpers\FlashHelper;
use App\Http\Requests;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\ChangePasswordRequest;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, FlashHelper $flash)
    {
        $user = User::create([
            'email' => Input::get('email'),
            'verified' => Input::get('verified'),
            'password' => bcrypt(Input::get('password')),
            'confirmation_code' => str_random(25)
        ]);
        
        event(new UserWasCreated($user));
        $flash->success('The account was created.');
        return Redirect::action('UsersController@show', ['id' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::whereId($id)->first();
        
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::whereId($id)->first();
        
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {   
        $user = User::whereId($id)->first();
        
        $user->update([
            'email' => Input::get('email'),
            'verified' => Input::get('verified')
        ]);
        
        $user->profile->update([
            'city' => Input::get('city'),
            'name' => Input::get('name'),
            'about' => Input::get('about')
        ]);
        
        $user->save();
        
        return Redirect::action('UsersController@show', ['id' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, FlashHelper $flash)
    {
        $user = User::whereId($id)->first();
        $user->delete();

        $flash->success('User was deleted');
        return Redirect::action('UsersController@index');
    }
    
    /**
     * Show form for editing the user's password.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
     public function getChangePassword($id)
     {
        $user = User::whereId($id)->first();
         
        return view('users/changepassword', compact('user'));
     }
     
     /**
      * Store form for editing the user's password.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
    public function postChangePassword(ChangePasswordRequest $request, $id)
    {
        $user = User::whereId($id)->first();
        
        $user->update([
            'password' => bcrypt(Input::get('password'))
        ]);

        $user->save();
        $flash->success('Password has been changed.');
        return Redirect::action('UsersController@show', ['id' => $user->id]);
    }
}
