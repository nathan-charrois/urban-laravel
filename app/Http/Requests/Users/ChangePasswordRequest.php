<?php 

namespace App\Http\Requests\Users;

Use Auth;
use App\Http\Requests\Request;

class ChangePasswordRequest extends Request
{
    public function authorize()
    {
        return Auth::check();
    }
    
    public function rules()
    {
        return [
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|same:password'
        ];
    }
}