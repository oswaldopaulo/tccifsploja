<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'token'=>'required|exists:empresas,token',
            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:usuarios_site',
            'password' => 'required|string|min:6|confirmed',
            
            'email' =>  [
                'required',
                Rule::unique('usuarios_site')
                ->where('idempresa', $data['idempresa'])
            ]
            
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
        
        $emp = DB::table('empresas')->where(['token'=>$data['token']])->first();
        
        if(isset($emp->id)){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'idempresa'=>$emp->id,
                'password' => bcrypt($data['password']),
            ]);
        } else {
            
        }
    }
}
