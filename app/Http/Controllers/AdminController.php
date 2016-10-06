<?php namespace App\Http\Controllers;

use App\contracts;
use App\Http\Requests;
use App\cars;
use App\User;
use App\countries;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;

use Request;
use Illuminate\Support\Facades\Input;
use Session;

class AdminController extends Controller {

    public function admin()
    {
        return view ('admin.admin');
    }

    public function index()
    {
        $cars = cars::All();
        return view ('admin.cars', compact('cars'));
    }

    public function car($id)
    {
        $cars = cars::findOrFail($id);
        return view ('admin.car', compact('cars'));
    }

    public function edit($id)
    {
        $input = Request::all();
        $cars = cars::find($id);
        $fla = AdminController::car($id);
        $rules = array('car_number' => 'required|max:255',
            'mark' => 'required|max:255',
            'model' => 'required|max:255',
            'cost_per_day' => 'required|integer',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return $fla->withErrors($validator);
        }
        else {
            if (Input::hasFile('car_image')) {
                if (Input::file('car_image')->isValid()) {
                    $destinationPath = 'images/cars/'; // upload path
                    $extension = Input::file('car_image')->getClientOriginalExtension(); // getting image extension
                    $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                    Input::file('car_image')->move($destinationPath, $fileName); // uploading file to given path
                    // sending back with message
                    Session::flash('success', 'Upload successfully');
                    $cars->car_number = $input['car_number'];
                    $cars->model = $input['model'];
                    $cars->mark = $input['mark'];
                    $cars->car_status = implode($input['car_status']);
                    $cars->car_class = implode($input['car_class']);
                    $cars->car_type = implode($input['car_type']);
                    $cars->cost_per_day = $input['cost_per_day'];
                    $cars->car_image = "/" . $destinationPath . "" . $fileName;
                    $cars->save();
                    return redirect()->intended('admin/cars');
                }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return $fla;
            }
            }
            else
            {
                $cars->car_number = $input['car_number'];
                $cars->model = $input['model'];
                $cars->mark = $input['mark'];
                $cars->car_status = implode($input['car_status']);
                $cars->car_class = implode($input['car_class']);
                $cars->car_type = implode($input['car_type']);
                $cars->cost_per_day = $input['cost_per_day'];
                $cars->save();
            }
        }
        return redirect('admin/cars');
    }
public function create()
{
    return view ('admin.create');
}

    public function store()
    {
        $rules = array('car_number' => 'required|max:255|unique:cars',
            'mark' => 'required|max:255',
            'model' => 'required|max:255',
            'cost_per_day' => 'required|integer',
            'car_image' => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->intended('admin/create')->withErrors($validator);
        }

        else {
            // checking file is valid.
            if (Input::file('car_image')->isValid()) {
                $destinationPath = 'images/cars/'; // upload path
                $extension = Input::file('car_image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('car_image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', 'Upload successfully');
                $input = Request::all();
                $input['car_status'] = implode($input['car_status']);
                $input['car_class'] = implode($input['car_class']);
                $input['car_type'] = implode($input['car_type']);
                $input['car_image'] = "/".$destinationPath."".$fileName;
                cars::create($input);
                return redirect()->intended('admin/cars');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('admin/create');
            }
        }
    }


    public function delete($id)
    {
        $cars = cars::find($id);
        $cars -> delete($id);
        return redirect('admin/cars');
    }


    public function add_manager_view()
    {
        $countries = countries::latest('country_name')->get();
        return view ('admin.add_manager', compact('countries'));
    }

    public function add_manager()
    {
        $rules = array('name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'birthday' => 'required',
            'telephone' => 'required|numeric',
            'password' => 'required|confirmed|min:6');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->intended('/admin/add_manager')->withErrors($validator);
        }
        $input = Request::all();
        $input['status'] = '1';
        $input['type'] = 'manager';
        $input['country_id'] = implode($input['countries']);
        $input['password'] = Hash::make($input['password']);
        User::create($input);
        return redirect('/admin/add_manager');
    }

    public function show_users()
    {
        $countries = countries::all();
        $users = User::latest('name')->where(
            'type','<>','administrator'
        )->get();
        return view ('admin.control_users', compact('users','countries'));
    }
    public function edit_status_block($id)
    {
        $users = User::find($id);
        $users -> status = '0';
        $users ->save();
        return AdminController::show_users();
    }

    public function edit_status_unblock($id)
    {
        $users = User::find($id);
        $users->status = '1';
        $users ->save();
        return AdminController::show_users();
    }

    //Отчеты
    public function register_rent_period() //отображение машин по всех контрактах
    {
        $cars = cars::all();
        $contracts = contracts::all();
        return view('admin.register_rent_period', compact('contracts','cars'));
    }

    public function register_rent_periodpost()//реестр орендованых авто за период
    {
        $input = Request::All();
        $rules = array(
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->intended('/admin/register_rent_period')->withErrors($validator);
        } else {
            if ((strtotime($input['end_date']) - strtotime($input['start_date']) < 0)) {
                return redirect()->intended('/admin/register_rent_period')->withErrors('Начальная дата больше Конечной ');
            } else {
                $cars = cars::all();
                $contracts = DB::table('contracts')
                    ->whereBetween('start_date', array(Input::get('start_date'), Input::get('end_date')))
                    ->where('contract_status', 'Подтвержден')
                    ->orwhere('contract_status', 'Закончен')
                    ->get();
                Session::flash('start_date', Input::get('start_date'));
                Session::flash('end_date', Input::get('end_date'));
                return view('admin.register_rent_period', compact('contracts', 'cars'));
            }
        }
    }

    public function rent_period() //отображение машин по всех контрактах
    {
        $cars = cars::all();
        $contracts = contracts::all();
        return view('admin.rent_period', compact('contracts','cars'));
    }

    public function rent_periodpost()//отчет про стоимость оренды за период
    {
        $input = Request::All();
        $rules = array(
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->intended('/admin/rent_period')->withErrors($validator);
        } else {
            if ((strtotime($input['end_date']) - strtotime($input['start_date']) < 0)) {
                return redirect()->intended('/admin/rent_period')->withErrors('Начальная дата больше Конечной ');
            }
            else
            {
                $cars = cars::all();
                $contracts = DB::table('contracts')
                    ->whereBetween('start_date', array(Input::get('start_date'), Input::get('end_date')))
                    ->where('contract_status', 'Подтвержден')
                    ->orwhere('contract_status', 'Закончен')
                    ->get();
                $summ = DB::table('contracts')
                    ->whereBetween('start_date', array(Input::get('start_date'), Input::get('end_date')))
                    ->where('contract_status', 'Подтвержден')
                    ->orwhere('contract_status', 'Закончен')
                    ->sum('cost');
                Session::flash('start_date', Input::get('start_date'));
                Session::flash('end_date', Input::get('end_date'));
                Session::flash('summ', $summ);
                return view('admin.rent_period', compact('contracts', 'cars'));
            }
        }
    }

public function top_10_popular_auto()
{
    $cars = DB::table('cars')
        ->orderby('count','desc')
        ->take(10)->get();
    return view('admin.top_10_popular_auto', compact('cars'));
}
    public function audit($id)
    {
        $users = user::all();
        $cars = cars::all();
        $contracts = DB::table('audits')
            ->where('user_id','=',$id)
            ->get();
        return view('admin.audit', compact('contracts','cars','users'));
    }
}
