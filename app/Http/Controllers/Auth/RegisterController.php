<?php

namespace App\Http\Controllers\Auth;

use App;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/en';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * create an index page to register
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(){
        return view('user.auth.register')->with('locale', App::getlocale());
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
            'email' => 'required | email | min:4 | max:26 | unique:users',
            'username' => 'required | min:4 | max:26 | unique:users.username',
            'password' => ['required' , 'min:8' , 'max:26' , 'confirmed' , 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[a-zA-Z0-9_.-]{8,26}$/'], // regex is make sure the user add at least one small letter ,one capital letter and one number between 8 to 26 character
            'created_by' => 'required',
            'created_at' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'created_by' => DB::table('users')->select('id')->orderBy('id','desc')->limit(1)->value('id') + 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
