<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class contracts extends Model {

    protected $fillable = [
        'user_id',
        'car_id',
        'manager_id',
        'contract_status',
        'driver',
        'start_date',
        'end_date',
        'cost',
        'updated_at'
    ];






}

