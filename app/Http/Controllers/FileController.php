<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\HelperFunction;
use App\Http\Requests\FileRequest;

use App\Models\ApiData;
use App\Models\File;
use App\Models\Summary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AssignmentRequest;
use Mail;
use PDF;


class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-file');
        $this->middleware('permission:create-file', ['only' => ['create','store']]);
        $this->middleware('permission:update-file', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-file', ['only' => ['destroy']]);
        // $this->middleware('permission:destroy-file', ['except' => ['pdf2']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::paginate(setting('record_per_page', 15));
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function store(FileRequest $request)
    {
        DB::beginTransaction();
        try{
            // $userData = $request->except(['profile_photo']);
            // $userData['code'] = $code;
            // $request->merge(['vat_number'=> $request->vat_numbe]);
            // dd($request->all());
            $file = File::create($request->all());
            
            DB::commit();
            
            $getClientAssignment = HelperFunction::getClientAssignment($file);
            $getAuditAssignment = HelperFunction::getAuditAssignment($file);
            // dd($file);

            // $file = File::create([

            // 'vat_number' =>$request->vat_number,
            // 'countries' => $request->countries,
            // 'company_name'=> $request->company_name,
            // 'company_address'=> $request->company_address,
            // 'email_address'=> $request->email_address,
            // 'phone_number'=> $request->phone_number,
            // 'region'=> $request->region,
            // 'ateco_code'=> $request->ateco_code,
            // 'creditsafe_rating'=> $request->creditsafe_rating,
            // 'credit'=> $request->credit,
            // 'company_administrator'=> $request->company_administrator,
            // 'sdi'=> $request->sdi,
            // 'benefit_id'=> $request->benefit_id,
            // 'created_by'=> Auth::user()->id,
            // 'year'=> $request->year,
            // 'fee'=> $request->fee,
            // 'customer_email'=> $request->customer_email,
            // 'opration_email'=> $request->opration_email,


            // ]);
            
            
            // $data = [
            //     'title' => 'Welcome to ItSolutionStuff.com',
            //     'date' => date('m/d/Y')
            // ];
            // $pdf = PDF::loadView('assignment', $file);
            
            flash('File created successfully!')->success();
            return redirect()->route('file.index');

        }catch (\Exception $e) {

            DB::rollback();
            flash('File created successfully!')->error();
            dd($e);
            return back();

        }
        
    }


    public function get_data(Request $request)
    {
        // https://documenter.getpostman.com/view/1432087/S1TZxF4w

        //getting company id from vat number
        $url = 'https://connect.creditsafe.com/v1/companies';
        $params = ['vatNo'=>$request->vat_num , 'countries'=>$request->country];
        $company = HelperFunction::GetResponse($url, $params);
        $company = $company['companies'];
        $company_id = $company[0]['id'];

        //geting company report by company id
        $url = 'https://connect.creditsafe.com/v1/companies/'.$company_id;
        $params = ['template'=>"complete" ,'language' => "en"];
        $company = HelperFunction::GetResponse($url, $params);
        $company = $company['report'];
        
        //createing report array
        $report = ['company_id' => $company['companyId']];
        $report += ['vatNo'=> $request->vat_num ];
        $report += ['businessName'=> $company['companySummary']['businessName']];
        $report += ['creditSafeRating'=> $company['creditScore']['currentCreditRating']['commonDescription']];
        $report += ['credits'=> $company['creditScore']['currentCreditRating']['creditLimit']['value']];
        
        if($company['contactInformation']['emailAddresses']){
            $report += ['pec_email'=> $company['contactInformation']['emailAddresses']['0']];
        }else{
            $report += ['pec_email'=> ''];
        }
        if(array_key_exists("telephone",$company['contactInformation']['mainAddress'])){
            $report += ['telephone'=> $company['contactInformation']['mainAddress']['telephone']];
        }else{
            $report += ['telephone'=> ''];
        }
        if($company['contactInformation']['mainAddress']){
            $report += ['address'=> $company['contactInformation']['mainAddress']['simpleValue']];
            $report += ['region'=> $company['contactInformation']['mainAddress']['city']];
        }else{
            $report += ['address'=> ''];
            $report += ['region'=> ''];
        }
        if($company['directors']['currentDirectors']){
            $report += ['director'=> $company['directors']['currentDirectors']['0']['name']];
        }else{
            $report += ['director'=> ''];
        }
        if($company['companySummary']['mainActivity']){
            $report += ['ateco_code'=> $company['companySummary']['mainActivity']['code']];
        }else{
            $report += ['ateco_code'=> ''];
        }
        // dd($report);
        return response()->json($report, 200,);
    }

}
