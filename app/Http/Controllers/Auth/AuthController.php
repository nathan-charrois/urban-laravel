<?php

namespace App\Http\Controllers\Auth;

use Redirect;
use Validator;
use App\User;
use App\Helpers\FlashHelper;
use App\Events\UserWasCreated;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect upon successful registration.
     *
     * @var string
     */
    protected $redirectPath = '/regions/create';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => [
            'getLogout',
            'verify'
        ]]);

        parent::__construct();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(25)
        ]);

        event(new UserWasCreated($user));
        return $user;
    }

    /**
     * @param  string       $token
     * @param  FlashHelper  $flash
     * @return \Illuminate\Http\Response
     */
    public function verify(FlashHelper $flash, $token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();

        $flash->success('Your account has been verified.');

        return Redirect::action('PagesController@index');
    }
}
