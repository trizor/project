<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{
		Model::unguard();
		$this->call('CarsTableSeeder');
        $this->call('CountriesTableSeeder');
        $this->call('PostsSeeder');
	}
}

class PostsSeeder extends  Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            array(
                'name'=> 'Tolstikov Sergey Sergeevich',
                'email'=>'admin@mail.ru',
                'password' =>Hash::make('123456'),
                'country_id' =>'1',
                'status' => '1',
                'telephone' => '065642665',
                'card_number'=> '',
                'birthday'=>'1994.03.08',
                'driver_license'=>'',
                'type'=>'administrator',
            ),
            array(
                'name'=> 'Toschev Vadim Olegovich',
                'email'=>'manager@mail.ru',
                'password' =>Hash::make('123456'),
                'country_id' =>'1',
                'birthday'=>'1993.01.09',
                'status' => '1',
                'telephone' => '063642855',
                'card_number'=> '',
                'driver_license'=>'',
                'type'=>'manager',
            ),
            array(
                'name'=> 'Bozhko Andrey Stanislavovich',
                'email'=>'user@mail.ru',
                'password' =>Hash::make('123456'),
                'country_id' =>'1',
                'status' => '1',
                'birthday'=>'1994.12.12',
                'telephone' => '0926255515',
                'card_number'=>'4532986278123456',
                'driver_license'=>'12569874 FR',
                'type'=>'user',
            ),
             array(
                 'name'=> 'Иванов Иван Иванович',
                 'email'=>'trizorpwnz@gmail.com',
                 'password' =>Hash::make('123456'),
                 'country_id' =>'4',
                 'status' => '1',
                 'birthday'=>'1994.5.13',
                 'telephone' => '0916258555',
                 'card_number'=> '4532986278654321',
                 'driver_license'=>'7826 DF 5945',
                 'type'=>'user',
             ),
            array(
                'name'=> 'Петров Степан Григорьевич',
                'email'=>'tosik19940@gmail.com',
                'password' =>Hash::make('123456'),
                'country_id' =>'3',
                'status' => '1',
                'telephone' => '0936355853',
                'birthday'=>'1994.6.23',
                'card_number'=> '8932986295654123',
                'driver_license'=>'123654987',
                'type'=>'user',
            ),
        );
        DB::table('users')->insert($users);
    }
}

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->delete();
        $cars = array(
        array(
            'car_number' => 'ВА 9999 АВ',
            'mark' => 'Lincoln',
            'model' => 'Limousine',
            'car_status'=>'Свободен' ,
            'car_class'=>'Премиум-класс',
            'car_type'=>'Лимузин',
            'count'=>126,
            'cost_per_day'=>'5000',
            'car_image' => '/images/cars/1.jpg'
        ),

            array(
                'car_number' => 'ВА 8877 АВ',
                'mark' => 'Mercedes',
                'model' => 'E43',
                'car_status'=>'Свободен' ,
                'car_class'=>'Бизнес-класс',
                'car_type'=>'Седан',
                'count'=>59,
                'cost_per_day'=>'1500',
                'car_image' => '/images/cars/2.jpg'
            ),
            array(
                'car_number' => 'ВА 1234 ВХ',
                'mark' => 'AUDI',
                'model' => 'A6',
                'car_status'=>'Свободен' ,
                'car_class'=>'Бизнес-класс',
                'car_type'=>'Седан',
                'count'=>43,
                'cost_per_day'=>'1300',
                'car_image' => '/images/cars/3.jpg'
            ),
            array(
                 'car_number' => 'ВА 1212 АВ',
                 'mark' => 'Honda',
                 'model' => 'Accord',
                 'car_status'=>'Свободен' ,
                 'car_class'=>'Средний-класс',
                 'car_type'=>'Седан',
                 'count'=>60,
                 'cost_per_day'=>'900',
                 'car_image' => '/images/cars/4.jpg'
             ),
                  array(
                      'car_number' => 'ВА 5988 АВ',
                      'mark' => 'Toyota',
                      'model' => 'Prado',
                      'car_status'=>'Свободен' ,
                      'car_class'=>'Средний-класс',
                      'car_type'=>'Внедорожник',
                      'count'=>25,
                      'cost_per_day'=>'1000',
                      'car_image' => '/images/cars/5.jpg'
                  ),
                       array(
                           'car_number' => 'ВА 3256 АВ',
                           'mark' => 'Opel',
                           'model' => 'Corsa',
                           'car_status'=>'Свободен' ,
                           'car_class'=>'Эконом-класс',
                           'car_type'=>'Хетчбек',
                           'count'=>180,
                           'cost_per_day'=>'500',
                           'car_image' => '/images/cars/6.jpg'
                       ),
                            array(
                                'car_number' => 'ВА 5948 ХП',
                                'mark' => 'Toyota',
                                'model' => 'Camry',
                                'car_status'=>'Свободен' ,
                                'car_class'=>'Средний-класс',
                                'car_type'=>'Седан',
                                'count'=>40,
                                'cost_per_day'=>'700',
                                'car_image' => '/images/cars/7.jpg'
                            ),
            array(
                'car_number' => 'ВА 5648 ИИ',
                'mark' => 'Land Rover',
                'model' => 'NLK 500',
                'car_status'=>'Свободен' ,
                'car_class'=>'Бизнес-класс',
                'car_type'=>'Внедорожник',
                'count'=>15,
                'cost_per_day'=>'1500',
                'car_image' => '/images/cars/8.jpg'
            ),
            array(
                'car_number' => 'ВА 9635 ОЛ',
                'mark' => 'Dacia',
                'model' => 'Sandero',
                'car_status'=>'Свободен' ,
                'car_class'=>'Эконом-класс',
                'car_type'=>'Кроссовер',
                'count'=>70,
                'cost_per_day'=>'400',
                'car_image' => '/images/cars/9.jpg'
            ),
        );
        DB::table('cars')->insert($cars);
    }
}


class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->delete();
        $countries = array(
            array(
                'country_name' => 'Украина',
            ),
            array(
                'country_name' => 'Россия',
            ),
            array(
                'country_name' => 'Беларусь',
            ),
            array(
                'country_name' => 'Чехия',
            ),
            array(
                'country_name' => 'Словакия',
            )
        );
        DB::table('countries')->insert($countries);
    }
}