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
    public function home() {
        $data = Array();
        $points = Array();

        for($x=1; $x< 4; $x++)
        {
            $arr = array("lon" => 10*$x,
                "lat" => 10*$x,
            "name" => 'name thing'.$x,
                "link" => 'http://google.com',
            "id" => 'id_'.$x);
            $points['drawings'][] = $arr;
        }

        $data['json']=json_encode($points);
        return View::make('home', compact('data'));       
    }

	public function test()
	{
		return View::make('test');
	}
	public function map()
	{

        $data = Array();
        $points = Array();

        for($x=1; $x< 4; $x++)
        {
            $arr = array("lon" => 10*$x,
                "lat" => 10*$x,
            "name" => 'name thing'.$x,
                "link" => 'http://google.com',
            "id" => 'id_'.$x);
            $points['drawings'][] = $arr;
        }

        $data['json']=json_encode($points);
		return View::make('map', compact('data'));
	}
    public function draw1($drawing_id = "default")
    {
        $data = array();
        $data['drawing_id']=$drawing_id;
        return View::make('draw1', compact('data'));
    }
    public function draw2()
    {
        return View::make('draw2');
    }
    public function raphael()
    {
        return View::make('raphael');
    }
    public function locationPost() {
        if (Request::ajax()) {
            Session::put('lon', $_POST['lon']);
            Session::put('lat', $_POST['lat']);
        }
    }
}
