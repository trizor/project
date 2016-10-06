<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\countries;


use Illuminate\Http\Request;

    class MainController extends Controller {



    public function services()
    {
        return view ('pages.service');
    }
        public function about_us()
        {
            return view ('pages.about_us');
        }
        public function contact()
        {
            return view ('pages.contact');
        }

        public function login()
        {
            return view ('auth.login');
        }
        public function register()
    {
        $countries = countries::latest('country_name')->get();
        return view ('auth.register', compact('countries'));
    }

}

