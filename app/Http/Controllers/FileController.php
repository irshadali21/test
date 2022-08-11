<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\HelperFunction;

use App\Models\ApiData;
use App\Models\File;
use App\Models\Summary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class FileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view-permission');
    //     $this->middleware('permission:create-permission', ['only' => ['create','store']]);
    //     $this->middleware('permission:update-permission', ['only' => ['edit','update']]);
    //     $this->middleware('permission:destroy-permission', ['only' => ['destroy']]);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $file = File::paginate(setting('record_per_page', 15));
        return view('files.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $url = 'https://connect.creditsafe.com/v1/people?countries=NO,GB&lastName=lastName';
        // $params = [];
        // $params = ['countries'=>'GB', 'lastName' => 'das'];    
        // $url = 'https://connect.creditsafe.com/v1/companies';
        // $params = ['countries'=>'IT', 'status'=>'active'];
        // $token = HelperFunction::GetResponse($url, $params);
        // $token = $token['companies'];
        // // foreach ($token as $t ) {
        // //    dd($t);
        // // }
        // dd($token);


        $url = 'https://connect.creditsafe.com/v1/access';
        $params = [''];
        $countries = HelperFunction::GetResponse($url, $params);
        $countries = $countries['countryAccess'];
        $countries = $countries['creditsafeConnectOnlineReports'];
        
        $exceptThis = [1];
        $benefit = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');
        return view('files.create', compact('benefit', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'vat_number' => 'required|unique:files',
            'countries' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',

            // 'email_address' => 'required',
            // 'phone_number' => 'required',
            // 'region' => 'required',
            // 'ateco_code' => 'required',
            // 'creditsafe_rating' => 'required',
            // 'credit' => 'required',
            // 'company_administrator' => 'required',
            // 'sdi' => 'required',
            // 'benefit_id' => 'required',
            // 'year' => 'required',
            // 'fee' => 'required',
            // 'customer_email' => 'required',
            // 'opration_email' => 'required',
        ]);
        DB::beginTransaction();
        try{

            File::create([

            'vat_number' =>$request->vat_number,
            'countries' => $request->countries,
            'company_name'=> $request->company_name,
            'company_address'=> $request->company_address,

            'email_address'=> $request->email_address,
            'phone_number'=> $request->phone_number,
            'region'=> $request->region,
            'ateco_code'=> $request->ateco_code,
            'creditsafe_rating'=> $request->creditsafe_rating,
            'credit'=> $request->credit,
            'company_administrator'=> $request->company_administrator,
            'sdi'=> $request->sdi,
            'benefit_id'=> $request->benefit_id,
            'created_by'=> Auth::user()->id,
            'year'=> $request->year,
            'fee'=> $request->fee,
            'customer_email'=> $request->customer_email,
            'opration_email'=> $request->opration_email,


            ]);
            DB::commit();
            return redirect()->back()->with('success',__('messages.data_saved_msg'));
        }catch (\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('danger',__('messages.unknown_err'));

        }
        
    }

    public function get_data(Request $request)
    {
        $url = 'https://connect.creditsafe.com/v1/companies';
        $params = ['vatNo'=>$request->vat_num , 'countries'=>$request->country];
        $company = HelperFunction::GetResponse($url, $params);
        $company = $company['companies'];
        foreach ($company as $t ) {
            return response()->json($t, 200,);
        }
        // dd($company);
        // dd($request->vat_num);

        return response()->json($company, 200,);
    }

}
