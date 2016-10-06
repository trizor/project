<?php namespace App\Http\Controllers;
use App\cars;
use App\Http\Controllers\Controller;
use App\contracts;
use App\Http\Requests;
use Request;
use DB;
class CarsController extends Controller {


    public function index_main()
    {
        return view ('pages.main');
    }

    public function index()
    {
        $contracts=contracts::all();
        $cars = DB::table('cars')->orderby('car_status')->get();
        return view ('pages.auto', compact('cars'),compact('contracts') );
    }


    public function show($id)
    {
        $cars = cars::findOrFail($id);
        return view ('user.show', compact('cars'));
    }

    public static function get_enum( $table, $field )
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'"));
        preg_match("/^enum\(\'(.*)\'\)$/", $type[0]->Type, $matches);
        foreach( explode(',', $matches[1]) as $value )
        {
            $enum[] = trim( $value, "'" );
        }
        return $enum;
    }

    public function cost_sort()
    {
        $input=Request::all();
        $input['car_class']=implode($input['car_class']);
        //$cars = cars::latest('cost_per_day')->where('car_class', '=',  $input['car_class'])->get();
        //  $cars = cars::latest('cost_per_day')->get();
        $cars=DB::table('cars')->where('car_class', '=',  $input['car_class'])->
        orderby('cost_per_day')-> get();
        return view ('pages.auto', compact('cars'));

    }

}
