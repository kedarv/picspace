<?php

class HomeController extends BaseController {
    // Outputs if user is within allowed range
    public function checkEditable($myLat, $myLng, $getLat, $getLng) {
        $earth_radius = 6371;
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c * .62137;
        if($d < 1) {
            return $editable = true;
        }
        else {
            return $editable = false;
        }
    }
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
        $data['editable'] =  $this->checkEditable($_SESSION['lat'], $_SESSION['lon'], $data['lat'], $data['lon']);
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


        $fire = Firebase::push('/draw1/drawings/', $data);
        return Redirect::action('HomeController@draw',array($fire['name']));
    }
}
