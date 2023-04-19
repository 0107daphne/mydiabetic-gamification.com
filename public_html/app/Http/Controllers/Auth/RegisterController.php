<?php

namespace App\Http\Controllers\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'phone_no' => ['required', 'string', 'max:255'],
            'emergency_name' => ['required', 'string', 'max:255'],
            'emergency_relation' => ['required', 'string', 'max:255'],
            'emergency_phone' => ['required', 'string', 'max:255'],
            'physician_name' => ['required', 'string', 'max:255'],
            'physician_phone' => ['required', 'string', 'max:255'],
            'allergies' => ['required', 'string', 'max:255'],
            'medical_condition' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'name' => $data['name'],
            'date_of_birth' => $data['date_of_birth'],
            'phone_no' => $data['phone_no'],
            'emergency_name' => $data['emergency_name'],
            'emergency_relation' => $data['emergency_relation'],
            'emergency_phone' => $data['emergency_phone'],
            'physician_name' => $data['physician_name'],
            'physician_phone' => $data['physician_phone'],
            'allergies' => $data['allergies'],
            'medical_condition' => $data['medical_condition'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
