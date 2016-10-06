<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\contracts;
use App\User;
use App\cars;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Request;
use Illuminate\Support\Facades\Mail;//Использование фасада email
use Input; //Использование класса для ввода данных
use Session;
use Illuminate\Support\Facades\DB;

    //Класс управления работой менеджера
class ManagerController extends Controller{
    //метод отображения панели меню
    public function manager()
    {
        return view ('manager.manager');
    }
    //метод отображения списка автомобилей дял менеджера
    public function home_manager()
    {
        $cars=cars::all();
        return view('manager.home_manager', compact('cars'));
    }
    //метод вывода на форму всей информации по контракту
    public function index()
    {
        $cars = cars::all();
        $users = User::all();
        $contracts = contracts::all();
       return view('manager.contracts', compact('contracts','cars','users'));
    }
    //метод для вывода автомобилей и контрактов в обработке
    public function show_unaccepted(){
        $cars =DB::table('cars')->where('car_status','=','Забронирован')->get();
        $users = User::all();
        $contracts = DB::table('contracts')->where('contract_status','=','В обработке')
            ->orderby('id','desc')
            ->get();
        return view ('manager.contracts', compact('contracts','cars','users'));
    }
    //метод подтверждения заявки на прокат
    public function accept_order($id,$car_id){
        $contracts = contracts::find($id);
        $contracts -> manager_id = Auth::user()->id;
        $contracts -> contract_status = 'Подтвержден';
        $contracts ->save();
        $cars = cars::find($car_id);
        $cars ->car_status = 'В прокате';
        $cars ->save();
        return ManagerController::show_unaccepted();

    }
    //метод вывода представления отказа заявки
    public function show_rejection_order($id)
    {   $cars = cars::all();
        $users = User::all();
        $contracts = contracts::find($id);
        return view('manager.email_rejection',compact('contracts','cars','users'));
    }
    //метод отправки сообщения пользователю
    public function post_rejection($id){
        $contracts = contracts::find($id);
        $contracts -> contract_status = 'Отменен';

              Mail::send('manager.mailers', ['name'=>Input::get('name'),'rejection'=>Input::get('rejection_reason')], function($message)
        {
            $message->to(Input::get('user_email'), Input::get('name'))->subject('Отказ заказа');
        });
        $contracts ->save();

        return ManagerController::show_unaccepted();
    }
    //метод вывода данных в представление
    public function return_car(){
        $cars = cars::all();
        $users = User::all();
        $contracts=DB::table('contracts')->where('contract_status','=','Подтвержден')
            ->orderby('end_date')
            ->get();
        return view ('manager.return_car', compact('contracts','cars','users'));
    }
    //метод подтверждения возврата авто
    public function accept_return($id,$car_id){
        $contracts = contracts::find($id);
        $contracts -> contract_status = 'Закончен';
        $contracts ->save();
        $cars = cars::find($car_id);
        $cars ->car_status = 'Свободен';
        $cars ->save();
        return ManagerController::return_car();
    }
    //метод создание контракта по id
    public function create_contract($id){
        $cars = cars::all();
        $users = User::all();
        $contracts = contracts::find($id);
        return view('manager.contract',compact('contracts','cars','users'));
    }
    //метод отправки контракта на почту пользователю
    public function send_contract($id,$car_id){
        $contracts = contracts::find($id);
        $contracts -> manager_id = Auth::user()->id;
        $contracts -> contract_status = 'Подтвержден';
        $contracts ->save();
        $cars = cars::find($car_id);
        $cars ->car_status = 'В прокате';
        $cars->count=$cars->count+1;
        $cars ->save();
        $cars=cars::findorfail($contracts->car_id);
        $users = User::findorfail($contracts->user_id);
        $manager = User::findorfail($contracts->manager_id);
        Mail::send('manager.send_contract', ['number_contract'=>$contracts->id,
            'contracts_start_date'=>$contracts->start_date,
            'contracts_end_date'=>$contracts->end_date,
            'manager_name'=>$manager->name,
            'user_name'=>$users->name,
            'car_mark'=>$cars->mark,
            'car_car_class'=>$cars->car_class,
            'car_car_number'=>$cars->car_number,
            'car_cost_per_day'=>$cars->cost_per_day,
            'contracts_cost'=>$contracts->cost], function($message)
        {
            $message->to(Input::get('user_email1'), Input::get('name1'))->subject('Контракт на оренду');
        });

        return redirect('/manager/contracts');
    }
    //метод вывода представления акта возврата авто
    public function create_act_return($id){
        $cars = cars::all();
        $users = User::all();
        $contracts = contracts::find($id);
        return view('manager.return_act',compact('contracts','cars','users'));
    }
} 