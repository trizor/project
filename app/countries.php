<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class countries extends Model {

    protected $fillable = ['country_name'];


    /**
     * В нескольких пользователей может быть одна страна
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Users()
    {
        return $this->hasMany('App\User');
    }

}
