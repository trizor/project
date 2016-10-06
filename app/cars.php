<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class cars extends Model
{
    protected $table = 'cars';


    protected $fillable = [
        'id',
        'car_number',
        'model',
        'mark',
        'car_status',
        'car_class',
        'car_type',
        'cost_per_day',
        'car_image'
    ];

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
}