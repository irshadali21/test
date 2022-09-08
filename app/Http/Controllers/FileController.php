<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\HelperFunction;
use App\Http\Requests\FileRequest;

use App\Models\ApiData;
use App\Models\File;
use App\Models\Summary;
use App\Models\Company;
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
        $exceptThis = [1];
        $benefit = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');
        return view('files.create', compact('benefit'));
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
            if($request->advisor_id){
                $advisor = $request->advisor_id;
            }else{
                $advisor = Auth::user()->id;
            }
            $company = Company::where('vat_number', $request->vat_number)->first();
            $query="->where('company_id', $company->id)->Where('benefit_id' , $request->benefit_id)->Where('year', $request->year)";
            $check_file = File::where(function ($query) {})->first();
            
            if($check_file){
                flash('File Already Exist with same Year and Benefits!')->error();
                return back();
            }else{
            $file = File::create([
                'company_id' => $company->id,
                'benefit_id' => $request->benefit_id,
                'year' => $request->year,
                'fee' => $request->fee,
                'customer_email' => $request->customer_email,
                'opration_email' => $request->opration_email,
                'created_by' => Auth::user()->id,
                'advisor_id' => $advisor,
            ]);
            }
            DB::commit();
            
            // $getClientAssignment = HelperFunction::getClientAssignment($file);
            // $getAuditAssignment = HelperFunction::getAuditAssignment($file);            
            flash('File created successfully!')->success();
            return redirect()->route('files.index');

        }catch (\Exception $e) {

            DB::rollback();
            flash('There was an error')->error();
            return back();

        }
        
    }


    public function get_data_api(Request $request)
    {
        $report = Company::where('vat_number', $request->vat_num)->first();
        if($report)
        {
            // $data = ['massage' => 'Company already exist in database'];
            return response()->json('Company already exist in database' , 400,);
        }else{
            return $this->get_data($request);
        }
    }
    public function get_data_database(Request $request)
    {
        $company = Company::where('vat_number', $request->vat_num)->first();
        if($company)
        {
            $report = ['businessName'=> $company->company_name];
            $report += ['vatNo' => $company->vat_number];
            $report += ['address'=> $company->company_address];
            $report += ['country'=> $company->country ];
            $report += ['pec_email'=> $company->email_address];
            $report += ['telephone'=> $company->phone_number];
            $report += ['region'=> $company->region];
            $report += ['ateco_code'=> $company->ateco_code];
            $report += ['creditSafeRating'=> $company->creditsafe_rating];
            $report += ['credits'=> $company->credit];
            $report += ['director'=> $company->company_administrator];
            $report += ['sdi'=> $company->sdi];

            return response()->json($report, 200,);
        }else{
            return response()->json('Company does not exist in database' , 400,);

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

        //saving it in database
        $company = Company::create([
            'created_by' => Auth::user()->id,
            'company_name' => $report['businessName'],
            'contact_id' => $report['company_id'],
            'vat_number' => $report['vatNo'],
            'company_address' => $report['address'],
            'country' => $request->country,
            'email_address' => $report['pec_email'],
            'phone_number' => $report['telephone'],
            'region' => $report['region'],
            'ateco_code' => $report['ateco_code'],
            'creditsafe_rating' => $report['creditSafeRating'],
            'credit' => $report['credits'],
            'company_administrator' => $report['director'],
            ]);
        // dd($report);
        return response()->json($report, 200,);
    }

    public function show($id)
    {
        $file = File::where('id', $id)->first();
        // dd($file, $file->company);
        return view('files.show', compact('file'));

    }

    public function client_assignment_download($id)
    {
        $file = File::where('id', $id)->first();
        $fileData = HelperFunction::getClientAssignment($file);        
        $pdf = PDF::loadView('assignment.index', $fileData);
        $name = $file->company->company_name;
        return $pdf->download($name.'pdf');

        return view( 'assignment.client', $fileData);

    }
    public function advoiser_assignment_download($id)
    {
        $file = File::where('id', $id)->first();
        $fileData = HelperFunction::getAuditAssignment($file);            
        $pdf = PDF::loadView('assignment.pdf2', $fileData);
            $name = $file->company->company_name;
            return $pdf->download($name.'pdf');
        
        return view('assignment.advisor', $fileData);

    }
    public function client_assignment($id)
    {
        $file = File::where('id', $id)->first();
        $fileData = HelperFunction::getClientAssignment($file);        
        $pdf = PDF::loadView('assignment.index', $fileData);
        $name = $file->company->company_name;
        
        $data["email"] = $file->customer_email;
        $data["name"] = $file->company_name;
        $data["title"] = "From revman.com";
        $data["body"] = "You'll find the attachment below";
        $data["auditor"] = $file->advisor->name;

        $pdf = PDF::loadView('assignment.index', $fileData);

        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
        
        
        flash('Assignment sent to Client via Email')->success();
        return back();
    }
    public function advoiser_assignment($id)
    {
        $file = File::where('id', $id)->first();
        $fileData = HelperFunction::getAuditAssignment($file);            
        $pdf = PDF::loadView('assignment.pdf2', $fileData);
            $name = $file->company->company_name;

            $data["email"] = $file->advisor->email_pec;
            $data["title"] = "From revman.com";
            $data["body"] = "You'll find the attachment below";
            $data["name"] = $file->advisor->name;
            // dd($data["auditor"]);
    
            $pdf = PDF::loadView('assignment.pdf2', $fileData);
            
            Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
                $message->to($data["email"], $data["email"])
                        ->subject($data["title"])
                        ->attachData($pdf->output(), "text.pdf");
            });

            flash('Assignment sent to Advoiser via Email')->success();
            return back();

    }


}
