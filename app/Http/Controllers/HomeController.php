<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Core\HelperFunction;
use App\ApiData;
use Session;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Models\File;
use App\Models\Company;

use App\User;


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
    public function search(Request $request)
    {
        // dd($request->all());
        $user_result = User::where('name','LIKE','%'.$request->search.'%')->get();
        $company_result = Company::where('company_name','LIKE','%'.$request->search.'%')->get();
        
        return view('search.index', compact('user_result', 'company_result'));
    }
}
