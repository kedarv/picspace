<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function test()
	{
		return View::make('test');
	}
	public function register()
	{

        $data = Array();
        $points = Array();
        $points['current']['lon'] = 0;
        $points['current']['lat'] = 0;




        for($x=0; $x< 3; $x++)
        {
            $arr = array("lon" => 0,
                "lat" => 0,
            "name" => 'name thing'.$x,
            "id" => 'id_'.$x);
            $points['drawings'][] = $arr;
        }

        $data['json']=json_encode($points);
        var_dump($data);

		return View::make('register', compact('data'));
	}
    public function draw1($drawing_id)
    {
        $data = array();
        $data['drawing_id']=$drawing_id;
        return View::make('draw1', compact('data'));
    }
    public function draw2()
    {
        return View::make('draw2');
    }

}
