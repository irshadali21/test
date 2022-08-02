<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Core\HelperFunction;
use App\ApiData;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Session::forget('success');

        Session::put('success', 'you are getting welcomed');
        return view('home');
        
        $url = 'https://connect.creditsafe.com/v1/access';
        $params = [];
        $response = HelperFunction::GetResponse($url, $params);
        $data = $response['countryAccess'];
        // dd($data['creditsafeConnectOnlineReports'][0]['countryName']);
       
    }
}
