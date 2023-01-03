<?php

namespace App\Http\Controllers;

use App\Core\HelperFunction;
use App\Http\Requests\FileRequest;
use App\Models\ApiData;
use App\Models\Company;
use App\Models\EmailTrack;
use App\Models\File;
use App\Models\Summary;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use PDF;
use Illuminate\Notifications\Messages\MailMessage;
// use Illuminate\Notifications\Notification;
Use Illuminate\Support\Facades\Notification;
use App\Notifications\NewMessage;


class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-file');
        $this->middleware('permission:create-file', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-file', ['only' => ['edit', 'update']]);
        $this->middleware('permission:destroy-file', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::user()->hasrole('super-admin') || Auth::user()->can('view-all-files') ) {
            $files = File::get();
        } else {
            $files = File::where('advisor_id', auth()->user()->id)->get();
        }

        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Total_api_calls = ApiData::first();
        $Total_api_calls = $Total_api_calls->total_api_count;

        $exceptThis = [1];
        $cuntries = HelperFunction::getCountries();
        $advisor = User::pluck('name', 'id');
        $benefit = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');
        return view('files.create', compact('benefit', 'cuntries', 'advisor', 'Total_api_calls'));
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
        try {
            if ($request->advisor) {
                $advisor = $request->advisor;
            } else {
                $advisor = Auth::user()->id;
            }
            $company = Company::where('vat_number', $request->vat_number)->first();
            $check_file = File::where('company_id', $company->id)
                ->Where('benefit_id', $request->benefit_id)
                ->Where('year', $request->year)->first();
            if ($check_file) {
                flash('File Already Exist with same Year and Benefits!')->error();
                return back();
            } else {
                $file = File::create([
                    'company_id' => $company->id,
                    'benefit_id' => $request->benefit_id,
                    'year' => $request->year,
                    'fee' => $request->fee,
                    'sdi' => $request->sdi,
                    'customer_email' => $request->customer_email,
                    'opration_email' => $request->opration_email,
                    'created_by' => Auth::user()->id,
                    'advisor_id' => $advisor,
                ]);
            }
            DB::commit();
            flash('File created successfully!')->success();
            return redirect()->route('files.index');

        } catch (\Exception $e) {

            DB::rollback();
            flash('There was an error')->error();
            return back();

        }

    }

    public function get_data_api(Request $request)
    {
        $report = Company::where('vat_number', $request->vat_num)->first();
        if ($report) {
            return response()->json('Company already exist in database', 400, );
        } else {
            return $this->get_data($request);
        }
    }

    public function get_data_database(Request $request)
    {
        $company = Company::where('vat_number', $request->vat_num)->first();
        if ($company) {
            $report = ['businessName' => $company->company_name];
            $report += ['vatNo' => $company->vat_number];
            $report += ['address' => $company->company_address];
            $report += ['country' => $company->country];
            $report += ['pec_email' => $company->email_address];
            $report += ['telephone' => $company->phone_number];
            $report += ['region' => $company->region];
            $report += ['ateco_code' => $company->ateco_code];
            $report += ['creditSafeRating' => $company->creditsafe_rating];
            $report += ['credits' => $company->credit];
            $report += ['director' => $company->company_administrator];
            $report += ['sdi' => $company->sdi];

            return response()->json($report, 200, );
        } else {
            return response()->json('Company does not exist in database', 400, );

        }
    }

    public function get_data(Request $request)
    {

        // https://documenter.getpostman.com/view/1432087/S1TZxF4w

        //getting company id from vat number
        $url = 'https://connect.creditsafe.com/v1/companies';
        $params = ['vatNo' => $request->vat_num, 'countries' => $request->country];
        $company = HelperFunction::GetResponse($url, $params);
        $company = $company['companies'];
        $company_id = $company[0]['id'];

        //geting company report by company id
        $url = 'https://connect.creditsafe.com/v1/companies/' . $company_id;
        $params = ['template' => "complete", 'language' => "en"];
        $company = HelperFunction::GetResponse($url, $params);
        $company = $company['report'];

        //createing report array
        $report = ['company_id' => $company['companyId']];
        $report += ['vatNo' => $request->vat_num];
        $report += ['businessName' => $company['companySummary']['businessName']];
        $report += ['creditSafeRating' => $company['creditScore']['currentCreditRating']['commonDescription']];
        $report += ['credits' => $company['creditScore']['currentCreditRating']['creditLimit']['value']];

        if (isset($company['contactInformation']['emailAddresses'])) {
            $report += ['pec_email' => $company['contactInformation']['emailAddresses']['0']];
        } else {
            $report += ['pec_email' => ''];
        }
        // if (isset($company['contactInformation']['mainAddress'])) {
        if (isset($company['contactInformation']['mainAddress']['telephone'])) {
            $report += ['telephone' => $company['contactInformation']['mainAddress']['telephone']];
        } else {
            $report += ['telephone' => ''];
        }
        if (isset($company['contactInformation']['mainAddress'])) {
            $report += ['address' => $company['contactInformation']['mainAddress']['simpleValue']];
            $report += ['region' => $company['contactInformation']['mainAddress']['city']];
        } else {
            $report += ['address' => ''];
            $report += ['region' => ''];
        }
        if (isset($company['directors']['currentDirectors'])) {
            if (isset($company['directors']['currentDirectors'])) {
                $report += ['director' => $company['directors']['currentDirectors']['0']['name']];
            }else {
                $report += ['director' => ''];
            }
        } else {
            $report += ['director' => ''];
        }
        if (isset($company['companySummary']['mainActivity']['code'])) {
            $report += ['ateco_code' => $company['companySummary']['mainActivity']['code']];
        } else {
            $report += ['ateco_code' => ''];
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
        return response()->json($report, 200, );
    }

    public function show($id)
    {
        // dd();
        $file = File::where('id', $id)->first();

        $advisor = User::withTrashed()->find($file->advisor_id);
        $EmailTrackCLI = EmailTrack::where('model_id', $id)->where('model', 'App\Models\File::CLI')->get();
        $EmailTrackREV = EmailTrack::where('model_id', $id)->where('model', 'App\Models\File::REV')->get();
        $EmailTrackCertificate = EmailTrack::where('model_id', $id)->where('model', 'App\Models\Certificate')->get();
        return view('files.show', compact('file', 'advisor', 'EmailTrackCLI', 'EmailTrackREV', 'EmailTrackCertificate'));

    }

    public function client_assignment_download($id)
    {
        $file = File::where('id', $id)->first();
        $fileData = HelperFunction::getClientAssignment($file);
        $pdf = PDF::loadView('assignment.index', $fileData);
        $name = $file->company->company_name . ' - Incarico_Cli - ' . $file->benefit->column1 . ' - ' . $file->year;
        return $pdf->download($name . '.pdf');
    }

    public function advoiser_assignment_download($id)
    {
        $file = File::where('id', $id)->first();

        $fileData = HelperFunction::getAuditAssignment($file);
        $pdf = PDF::loadView('assignment.pdf2', $fileData);
        $name = $file->company->company_name . ' - Incarico_Rev - ' . $file->benefit->column1 . ' - ' . $file->year;
        return $pdf->download($name . '.pdf');
    }

    public function client_assignment($id)
    {
        $file = File::where('id', $id)->first();

        //Email Check
        if (empty($file->customer_email)) {
            flash('Please add a customer email in Aassignment')->error();
            return back();
        } else if (empty($file->advisor->email)) {
            flash('Please add a Advisor Email in Advisor Profile')->error();
            return back();
        } else if (empty($file->opration_email)) {
            flash('Please add a Opration Email in Aassignment')->error();
            return back();
        }

        $fileData = HelperFunction::getClientAssignment($file);
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();
        $pdf = PDF::loadView('assignment.index', $fileData);

        $data["title"] = "From Revman";

        $data["email"] = $file->customer_email;
        // $data["solida_email"] = $file->customer_email;
        $data["solida_email"] = 'coordinamento.certificazioni@solidateam.it';
        $data["opration_email"] = $file->opration_email;
        $data["advisor_email"] = $file->advisor->email;

        // $data["email"] ='easyfun1@greendike.com';
        // $data["opration_email"] = 'easyfun2@greendike.com';
        // $data["advisor_email"] = 'easyfun3@greendike.com';
        // $data["solida_email"] = 'easyfun4@greendike.com';

        $data["subject"] = "Conferimento incarico per attività di " . $benefits->column1 . " annualità " . $file->year;
        $data["body"] = "Buondì, <br>
        la presente per inviare quanto in oggetto. <br>
        Allorquando riceveremo l’incarico controfirmato, verranno avviate le attività relative alla certificazione, al termine delle quali sarà nostra premura inoltrarvi tutta la
        documentazione inerente. <br>
        Cordialità";
        $data["auditor"] = $file->advisor->name;
        $name = $file->company->company_name . '– INCARICO_CLI-' . $benefits->column1 . " - " . $file->year;

        $pdf = PDF::loadView('assignment.index', $fileData);

        // foreach (['coordinamento.certificazioni@solidateam.it', $file->customer_email, $file->opration_email, $file->advisor->email] as $recipient) {
        //     Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name, $recipient) {
        //         $message
        //             ->to($recipient)
        //             ->subject($data["subject"])
        //             ->attachData($pdf->output(), $name . ".pdf");
        //     });
        // }
        // dd($data);


        // $data["email"] ='easyfun1@greendike.com';
        //         $mail =  Notification::route('mail', $data["email"])->notify( new NewMessage());
        // dd( $mail);


        Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name) {
            $message
                ->to($data["email"], $data["email"])
                ->cc([$data["solida_email"], $data["opration_email"], $data["advisor_email"]])
                ->subject($data["subject"])
                ->attachData($pdf->output(), $name . ".pdf");
        });

        EmailTrack::create([
            'created_by' => Auth::user()->id,
            'model' => 'App\Models\File::CLI',
            'model_id' => $file->id,
            'date' => date('d/m/Y H:m:s'),

        ]);
        flash('Assignment sent to Client via Email')->success();
        return back();
    }

    public function advoiser_assignment($id)
    {
        $file = File::where('id', $id)->first();
        $benefits = Summary::where('id', $file->benefit_id)->firstorfail();

        if (!$file->advisor->email) {
            flash('Please Update Login Email in Profile of Advoiser')->error();
            return back();
        }
        $fileData = HelperFunction::getAuditAssignment($file);
        $pdf = PDF::loadView('assignment.pdf2', $fileData);
        $data["email"] = $file->advisor->email;
        $data["solida_email"] = 'coordinamento.certificazioni@solidateam.it';
        $data["subject"] = "Affidamento attività di revisione relativamente a " . $benefits->column1 . " annualità " . $file->year . " per l’azienda" . $file->company->company_name;
        $data["title"] = "From Revman";
        $data["body"] = "Buondì, <br>
            In allegato quanto in oggetto. <br>
            Cordialità";
        $data["name"] = $file->advisor->name;
        $name = $file->company->company_name . " – INCARICO_REV - " . $benefits->column1 . " - " . $file->year;

        Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name) {
            $message
                ->to($data["email"], $data["email"])
                ->cc([$data["solida_email"]])
                ->subject($data["subject"])
                ->attachData($pdf->output(), $name . ".pdf");
        });

        EmailTrack::create([
            'created_by' => Auth::user()->id,
            'model' => 'App\Models\File::REV',
            'model_id' => $file->id,
            'date' => date('d/m/Y H:m:s'),

        ]);
        flash('Assignment sent to Advoiser via Email')->success();
        return back();

    }

    public function edit($id)
    {
        $file = File::where('id', $id)->first();
        if (!$file) {
            flash('File Does Not Exist');
            return back();
        }
        $cuntries = HelperFunction::getCountries();
        $advisor = User::pluck('name', 'id');
        $exceptThis = [1];
        $benefit = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');

        return view('files.edit', compact('file', 'benefit', 'cuntries', 'advisor'));
    }

    public function update(Request $request)
    {
        $file = File::where('id', $request->file_id)->firstorFail();
        DB::beginTransaction();
        try {
            if ($request->advisor) {
                $advisor = $request->advisor;
            } else {
                $advisor = Auth::user()->id;
            }
            $company = Company::where('vat_number', $request->vat_number)->first();
            $query = "->where('company_id', $company->id)->Where('benefit_id' , $request->benefit_id)->Where('year', $request->year)";

            $check_file = File::where('id', '!=', $request->file_id)
                ->where('company_id', $company->id)
                ->Where('benefit_id', $request->benefit_id)
                ->Where('year', $request->year)->first();

            if ($check_file) {
                flash('File Already Exist with same Year and Benefits!')->error();
                return back();
            } else {
                $file = $file->update([
                    'company_id' => $company->id,
                    'benefit_id' => $request->benefit_id,
                    'advisor_id' => $advisor,
                    'year' => $request->year,
                    'fee' => $request->fee,
                    'sdi' => $request->sdi,
                    'customer_email' => $request->customer_email,
                    'opration_email' => $request->opration_email,
                ]);
            }
            DB::commit();

            flash('File created successfully!')->success();
            return redirect()->route('files.index');

        } catch (\Exception $e) {
            DB::rollback();
            flash('There was an error')->error();
            return back();

        }
    }

    public function testemailnewmassge()
    {
         $data["email"] ='easyfun1@greendike.com';
                $mail =  Notification::route('mail', $data["email"])->notify( new NewMessage());
        dd( $mail);

    }
}
