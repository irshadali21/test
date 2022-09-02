<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Core\HelperFunction;
use App\ApiData;
use Session;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
        // Session::put('success', 'you are getting welcomed');
        return view('home');
    }
    public function test($id)
    {
        print_r( 'your command was => '. $id);
        echo '<br>';
        echo '<br>';
        print_r(shell_exec($id));
    }
}
