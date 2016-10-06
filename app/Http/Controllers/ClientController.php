<?php namespace App\Http\Controllers;

use App\cars;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\contracts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Mail;
class ClientController extends Controller
{
    public function contracts($id)
    { $contracts=contracts::all();
        $cars = cars::findOrFail($id);
        return view('user.orders', compact('cars'),compact('contracts'));

    }

    public  function service()
    {$contracts=contracts::all();
        return view('user.service', compact('contracts'));
    }

    public function store()
    {

        $input = Request::all();

        //  $id_contracts=$input['id'];
        $id_car = $input["id_car"];
        $id_user = $input['id_user'];
        $car = cars::find($id_car);
        $car->car_status='Забронирован';
        $rules = array(
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->intended('orders/' . $id_car)->withErrors($validator);
        } else {
            $input = Request::all();
            $input['car_id'] = $id_car;
            $input['user_id'] = $id_user;
             if (Input::get('driver') == true) {
                $input['driver'] = '1';
            } else {
                $input['driver'] = '0';
            }
            $input['start_date'] = $input['start_date'];
            $input['end_date'] = $input['end_date'];
            $input['contract_status']='В обработке';
            if ((strtotime($input['end_date']) - strtotime($input['start_date']) < 0)) {
                return redirect()->intended('orders/' . $id_car)->withErrors('Начальная дата больше Конечной ');
            } else {
                if ($input['driver'] == '1') {

                    $cost_date = floor((strtotime($input['end_date']) - strtotime($input['start_date'])) / (3600 * 24)) * 100;
                    $input['cost'] = floor((strtotime($input['end_date']) - strtotime($input['start_date'])) / (3600 * 24)) * ($input['costs']) + $cost_date;
                } else {
                    $input['cost'] = floor((strtotime($input['end_date']) - strtotime($input['start_date'])) / (3600 * 24)) * ($input['costs']);
                }
                contracts::create($input);
                $car->save();
                return redirect()->intended('service/');


            }
        }
    }

    public function user()
    {$User=contracts::all();

        return view('user.user' , compact('users'));

    }
    public function orders_user()
    {   $cars = cars::all();
        $users =  Auth::user()->id;
        $contracts=contracts::all();

        $contracts=contracts::latest('user_id')->where('user_id','=',$users
        )->where('contract_status','=','В обработке')
            ->get();
        return view('user.orders_user' , compact('contracts','cars','users'));
    }
    public function orders_his()
    {$cars = cars::all();
        $users =  Auth::user()->id;
        $contracts=contracts::all();

        $contracts=contracts::latest('user_id')->where('user_id','=',$users
        )->where('contract_status','=','Закончен')
            ->get();
        return view('user.orders_his' , compact('contracts','cars','users'));

    }

    public function cancel($id)
    {
        $contracts = contracts::find($id);
        $cars=cars::findorfail($contracts->car_id);
        $contracts -> contract_status = 'Закончен';
        if((strtotime(Carbon::now())-strtotime($contracts->updated_at))>7)
            {
                $result=(strtotime(Carbon::now()->format('Y-m-d'))-strtotime( $contracts->updated_at->format('Y-m-d')))/ (3600 * 24);
               $cost_all=($result-7)*($cars->cost_per_day)/2;




                Mail::send('user.mailers', ['name'=>Auth::user()->name,'cost_all'=>$cost_all], function($message)
                {
                    $message->from('no-reply@site.com', "Site name");
                    $message->to(Auth::user()->email)->subject('Вы нарушили условия Контракта');
               });
            }
        $contracts ->save();



      return ClientController::orders_user();

    }

    public  function search($mark)
    {$cars = cars::all();
        $cars = DB::table('cars')
            ->where('mark','LIKE',$mark.'%')
            ->orwhere('model','LIKE',$mark.'%')
            ->get();

        return view ('pages.auto', compact('cars')) ;
    }
    public function usl_contracta()
    {
        return view ('user.usl_contracta');
    }

    public function edit()
    {

    $users  = User::findorfail(Auth::user()->id);
        $users->name=Input::get('user_name');
        $users->email=Input::get('use_email');
        $users->telephone=Input::get('use_telephone');
        $users->driver_license=Input::get('use_driver_license');
        $users->save();
        return redirect()->intended('user/');
}


}