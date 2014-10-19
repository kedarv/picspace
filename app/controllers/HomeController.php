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
        $drawings = Firebase::get('/draw1/drawings');
        foreach($drawings as $key => $eachDrawing)
        {
            $arr = array(
                "lon" => $eachDrawing['data']['lon'],
                "lat" => $eachDrawing['data']['lat'],
                "name" => $eachDrawing['data']['name'],
                "link" => URL::to('/')."/draw/".$key,
            "id" => $key);
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
        $drawings = Firebase::get('/draw1/drawings');
        foreach($drawings as $key => $eachDrawing)
        {
            $arr = array(
                "lon" => $eachDrawing['data']['lon'],
                "lat" => $eachDrawing['data']['lat'],
                "name" => $eachDrawing['data']['name'],
                "link" => URL::to('/')."/draw/".$key,
            "id" => $key);
            $points['drawings'][] = $arr;
        }

        $data['json']=json_encode($points);
		return View::make('map', compact('data'));
	}
    public function draw($drawing_id = "default")
    {
        $drawings = Firebase::get('/draw1/drawings/'.$drawing_id);
        if($drawings==null)
            die('404');
        //$data['drawing_id']=$drawing_id;
        $data=$drawings['data'];
        $data['key']=$drawing_id;
        return View::make('draw', compact('data'));
    }
    public function locationPost() {
        if (Request::ajax()) {
            Session::put('lon', $_POST['lon']);
            Session::put('lat', $_POST['lat']);
        }
    }
    public function newDrawing()
    {
        $data = array();
        $data['lon']=Session::get('lon');
        $data['lat']=Session::get('lat');
        return View::make('newDrawing', compact('data'));
    }
    public function newFormAction()
    {
        $data=array();

        $arr = array(
            "lon" => Session::get('lon'),
            "lat" => Session::get('lat'),
            "name" => $_POST['drawingName'],
            "id" => 'id');
        $data['data']=$arr;


        Firebase::push('/draw1/drawings/', $data);
    }
}
