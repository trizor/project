<?php namespace App\Http\Controllers;

use App\countries;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Request;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class AuthControll extends Controller
{

    public function postRegister()
    {
        $rules = array('name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'telephone' => 'required|max:15',
            'driver_license' => 'required',
            'card_number'=>'numeric',
            'birthday' => 'required',
            'password' => 'required|confirmed|min:6');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->intended('register')->withErrors($validator);
        }
        $input = Request::all();
        $input['status'] = '1';
        $input['type'] = 'user';
        $input['country_id'] = implode($input['countries']);
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return AuthControll::postLogin();

    }


    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        $rules = array('email' => 'required', 'password' => 'required');
        $flag = false;
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->intended('login')->withErrors($validator);
        }
        if (Input::get('remember') == true) {
            $flag = true;
        }
        $auth = Auth::attempt(array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'status' => '1'), $flag);

        if (!$auth) {
            return redirect()->intended('login')->withErrors(array(
                'Ошибка авторизации или ваш аккаунт заблокирован!'
            ));
        }
        else {
            if (Auth::user()->type == 'administrator') {
                return Redirect::intended('admin/cars');
            }

            if (Auth::user()->type == 'manager') {
                return Redirect::intended('manager/contracts');
            }
            if (Auth::user()->type == 'user') {
                return redirect()->intended('home');
            }
        }
    }

    public function getLogout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/');
        }
    }
}